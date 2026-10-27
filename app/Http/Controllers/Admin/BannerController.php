<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return DataTables::of(Banner::get())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button title="Edit" href="javascript:;" onclick="load_input(\'' .route('admin.setting.banner.edit',$row->id).'\')" class="btn btn-sm icon icon-left btn-success"><i class="bi bi-pen"></i>
                    Edit</button>';
                    $btn .= '<button title="Delete" href="javascript:void(0)" onclick="handle_delete(\'' . route('admin.setting.banner.destroy', $row->id) . '\')" class="btn btn-sm icon icon-left btn-danger"> <i class="bi bi-trash"></i>
                    Hapus</button>';
                    return '<div class="d-flex align-items-center gap-2">'.$btn.'</div>';
                })
                ->editColumn('media', function($row) {
                    return  '<video playsinline="" data-automation="VideoPlayer" controls class="video-table rounded shadow-sm" preload="auto" aria-label="video-player">
                    <source src="'. $row->image .'" type="video/webm">
                    <source src="'. $row->image .'" type="video/mp4">
                    </video>';
                })
                ->rawColumns(['action','media'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'titlePage' => 'Tambah Banner',
            'infoPage' => 'Anda dapat menambahkan banner disini'
        ];

        return view('pages.admin.banner.input', $data, ['banner' => new Banner]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video' => 'required|max:81920',
            'tagline' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('video')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('video'),
                ]);
            }
            else if ($errors->has('tagline')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tagline'),
                ]);
            }
            else if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }

        $video = request()->file('video')->store('media_banner');
        $banner = new Banner;
        $banner->media = $video;
        $banner->tagline = $request->tagline;
        $banner->description = $request->description;
        $banner->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Banner berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        $data = [
            'titlePage' => 'Edit Banner',
            'infoPage' => 'Anda dapat mengubah banner disini'
        ];

        return view('pages.admin.banner.input', $data, compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'video' => 'max:81920',
            'tagline' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('tagline')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('tagline'),
                ]);
            }
            else if ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }

        if(request()->file('video')){
            $filePath = $banner->media;
            if (Storage::disk('public')->exists($filePath)) {
                $deleteResult = Storage::disk('public')->delete($filePath);
            }
            $video = request()->file('video')->store('media_banner');
            $banner->media = $video;
        }
        $banner->tagline = $request->tagline;
        $banner->description = $request->description;
        $banner->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Banner berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $filePath = $banner->media;
        if (Storage::disk('public')->exists($filePath)) {
            $deleteResult = Storage::disk('public')->delete($filePath);
        }
        $banner->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Banner berhasil dihapus',
        ]);
    }
}
