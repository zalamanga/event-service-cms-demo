<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\GalleryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            return DataTables::of(Gallery::orderBy('position', 'asc')->get())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button title="Preview" href="javascript:void(0)" onclick="load_input(\'' . route('admin.setting.gallery.show', $row->id) . '\')" class="btn btn-sm icon icon-left btn-primary"> <i class="bi bi-eye-fill"></i>
                    Lihat</button>';
                    $btn .= '<button title="Edit" href="javascript:;" onclick="load_input(\'' . route('admin.setting.gallery.edit', $row->id) . '\')" class="btn btn-sm icon icon-left btn-success"><i class="bi bi-pen"></i>
                    Edit</button>';
                    $btn .= ' <button title="Delete" href="javascript:void(0)" onclick="handle_delete(\'' . route('admin.setting.gallery.destroy', $row->id) . '\')" class="btn btn-sm icon icon-left btn-danger"> <i class="bi bi-trash"></i>
                    Hapus</button>';
                    return '<div class="d-flex align-items-center gap-2">' . $btn . '</div>';
                })
                ->editColumn('category_name', function ($row) {
                    return $row->category->name;
                })
                ->editColumn('photo', function ($row) {
                    return '<img src="' . $row->image . '" class="img-fluid" style="width: 100px; height: 100px; object-fit: cover;" alt="' . $row->image . '">';
                })
                ->rawColumns(['action', 'photo'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'titlePage' => 'Tambah Galeri',
            'infoPage' => 'Anda dapat menambahkan galeri disini'
        ];
        $categories = Category::get();

        return view('pages.admin.gallery.input', $data, ['gallery' => new Gallery, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category' => 'required|string|max:255',
            'files' => 'required|json',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'alert' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }

        $files = json_decode(request()->input('files'));
        $gallery = new Gallery;
        $gallery->category_id = $request->category;
        $gallery->name = $request->name;
        $gallery->photo = $files[0]->path;
        $gallery->save();

        foreach ($files as $key => $file) {
            $image = $file->path;
            $galleryDetail = new GalleryDetail;
            $galleryDetail->gallery_id = $gallery->id;
            $galleryDetail->photo = $image;
            $galleryDetail->size = $file->size;
            $galleryDetail->save();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Galeri berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        $data = [
            'titlePage' => 'Show Gallery',
            'infoPage' => 'Anda dapat melihat galeri disini'
        ];

        return view('pages.admin.gallery.detail', $data, compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            'titlePage' => 'Edit Galeri',
            'infoPage' => 'Anda dapat mengubah galeri disini',
        ];
        $gallery = Gallery::findOrFail($id);
        $categories = Category::get();

        return view('pages.admin.gallery.input', $data, compact('gallery', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category' => 'required|string|max:255',
            'files' => 'nullable|json',
        ]);

        if ($validator->fails()) {
            if ($validator->fails()) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $validator->errors()->first(),
                ]);
            }
        }
        $gallery->category_id = $request->category;
        $gallery->name = $request->name;

        $details = $gallery->details;
        if ($details) {
            // remove old data
            foreach ($details as $detail) {
                $filePath = $detail->photo;

                if (Storage::disk('public')->exists($filePath)) {
                    $deleteResult = Storage::disk('public')->delete($filePath);
                }

                $detail->delete();
            }
        }

        $files = json_decode(request()->input('files'));

        $gallery->photo = $files[0]->path;

        foreach ($files as $key => $file) {
            $image = $file->path;
            $galleryDetail = new GalleryDetail;
            $galleryDetail->gallery_id = $gallery->id;
            $galleryDetail->photo = $image;
            $galleryDetail->size = $file->size;
            $galleryDetail->save();
        }

        $gallery->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Galeri berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $galleryDetails = $gallery->details;
        foreach ($galleryDetails as $galleryDetail) {
            $filePath = $galleryDetail->photo;

            if (Storage::disk('public')->exists($filePath)) {
                $deleteResult = Storage::disk('public')->delete($filePath);
            }

            $galleryDetail->delete();
        }
        $gallery->delete();

        return response()->json([
            'alert' => 'success',
            'message' => 'Galeri berhasil dihapus',
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
        $image = request()->file('file')->store('gallery');

        return response()->json([
            'alert' => 'success',
            'message' => 'Foto berhasil diupload',
            'path' => $image,
        ]);
    }

    public function remove(Request $request)
    {
        $filePath = $request->url;

        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }

        $detailGallery = GalleryDetail::where('photo', $filePath)->first();
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
            Gallery::findOrFail($row['id'])->update([
                'position' => $row['position']
            ]);
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Galeri berhasil diurutkan',
        ]);
    }
}
