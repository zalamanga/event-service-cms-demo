<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DetailPacket;
use App\Models\Packet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $packets = Packet::with('category')->orderBy('position', 'asc')->get();
            return DataTables::of($packets)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button title="Preview" href="javascript:void(0)" onclick="load_input(\'' . route('admin.packet.show', $row->id) . '\')" class="btn btn-sm icon icon-left btn-primary"> <i class="bi bi-eye-fill"></i>
                    Lihat</button>';
                    $btn .= '<button title="Edit" href="javascript:;" onclick="load_input(\'' . route('admin.packet.edit', $row->id) . '\')" class="btn btn-sm icon icon-left btn-success"><i class="bi bi-pen"></i>
                    Edit</button>';
                    $btn .= ' <button title="Delete" href="javascript:void(0)" onclick="handle_delete(\'' . route('admin.packet.destroy', $row->id) . '\')" class="btn btn-sm icon icon-left btn-danger"> <i class="bi bi-trash"></i>
                    Hapus</button>';
                    return '<div class="d-flex align-items-center gap-2">' . $btn . '</div>';
                })
                ->editColumn('category_id', function ($row) {
                    return $row->category->name;
                })
                ->editColumn('primary', function ($row) {
                    return $row->primary == '1' ? 'Ya' : 'Tidak';
                })
                ->editColumn('price', function ($row) {
                    return 'Rp. ' . number_format($row->price);
                })
                ->editColumn('description', function ($row) {
                    return $row->description;
                })
                ->editColumn('image', function ($row) {
                    return '<img src="' . $row->photo . '" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;" alt="' . $row->name . '">';
                })
                ->rawColumns(['action', 'description', 'image'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'titlePage' => 'Tambah Paket Layanan',
            'infoPage' => 'Anda dapat menambahkan paket layanan disini'
        ];
        $categories = Category::get();

        return view('pages.admin.packet.input', $data, ['packet' => new Packet, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'required|json',
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
        $files = json_decode(request()->input('files'));
        $imageThumbnail = $files[0]->path;
        $packet = new Packet;
        $packet->name = $request->name;
        $packet->category_id = $request->category;
        $packet->price = Str::of($request->price)->replace(',', '') ?: 0;
        $packet->description = $request->description;
        if ($request->primary == 'on') {
            $packet->primary = '1';
        }
        $packet->image = $imageThumbnail;
        $packet->save();

        foreach ($files as $key => $file) {
            $detailPacket = new DetailPacket;
            $detailPacket->packet_id = $packet->id;
            $detailPacket->image = $file->path;
            $detailPacket->size = $file->size;
            $detailPacket->save();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Paket layanan berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $packet = Packet::findOrFail($id);
        $data = [
            'titlePage' => 'Show Packet',
            'infoPage' => 'Anda dapat melihat paket disini'
        ];

        return view('pages.admin.packet.detail', $data, compact('packet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'titlePage' => 'Edit Paket Layanan',
            'infoPage' => 'Anda dapat mengubah paket layanan disini',
        ];
        $packet = Packet::findOrFail($id);
        $categories = Category::get();

        return view('pages.admin.packet.input', $data, compact('packet', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
    {
        $packet = Packet::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'files' => 'required|json',
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $files = json_decode($request->input('files'));
        $imageThumbnail = $files[0]->path;

        $packet->name = $request->name;
        $packet->category_id = $request->category;
        $packet->price = Str::of($request->price)->replace(',', '') ?: 0;
        $packet->description = $request->description;
        $packet->primary = $request->primary ? '1' : '0';
        $packet->image = $imageThumbnail;
        $packet->save();

        // Get existing detail packets
        $existingDetails = DetailPacket::where('packet_id', $packet->id)->get();
        $existingPaths = $existingDetails->pluck('image')->toArray();

        // Update or create detail packets
        $newPaths = [];
        foreach ($files as $file) {
            $newPaths[] = $file->path;
            $detailPacket = DetailPacket::where('packet_id', $packet->id)
                                        ->where('image', $file->path)
                                        ->first();

            if (!$detailPacket) {
                $detailPacket = new DetailPacket();
                $detailPacket->packet_id = $packet->id;
                $detailPacket->image = $file->path;
            }

            $detailPacket->size = $file->size;
            $detailPacket->save();
        }

        // Remove detail packets that are no longer present
        $pathsToRemove = array_diff($existingPaths, $newPaths);
        foreach ($pathsToRemove as $path) {
            $detailToRemove = $existingDetails->firstWhere('image', $path);
            if ($detailToRemove) {
                if (Storage::exists($path)) {
                    Storage::delete($path);
                }
                $detailToRemove->delete();
            }
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Paket layanan berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $packet = Packet::findOrFail($id);
        $detailPacket = DetailPacket::where('packet_id', $packet->id)->get();
        foreach ($detailPacket as $item) {
            $filePath = $item->image;
            if (Storage::disk('public')->exists($filePath)) {
                $deleteResult = Storage::disk('public')->delete($filePath);
            }
            $item->delete();
        }
        $packet->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Paket layanan berhasil dihapus',
        ]);
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        // store image
        $image = request()->file('file')->store('packets');

        return response()->json([
            'alert' => 'success',
            'message' => 'Foto berhasil diupload',
            'path' => $image,
        ]);
    }

    public function remove(Request $request)
    {
        dd($request->all());
        $filePath = $request->url;

        if (Storage::exists($filePath)) {
            Storage::delete($filePath);
        }

        $detailGallery = DetailPacket::where('image', $filePath)->first();
        if ($detailGallery) {
            $detailGallery->delete();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Foto berhasil dihapus',
        ]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->input('rows', []) as $row) {
            Packet::findOrFail($row['id'])->update([
                'position' => $row['position']
            ]);
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Paket layanan berhasil diurutkan',
        ]);
    }
}
