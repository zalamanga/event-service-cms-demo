<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return DataTables::of(Category::orderBy('position', 'asc')->get())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button title="Edit" href="javascript:;" onclick="load_input(\'' . route('admin.category.edit', $row->id) . '\')" class="btn btn-sm icon icon-left btn-success"><i class="bi bi-pen"></i>
                    Edit</button>';
                    $btn .= ' <button title="Delete" href="javascript:void(0)" onclick="handle_delete(\'' . route('admin.category.destroy', $row->id) . '\')" class="btn btn-sm icon icon-left btn-danger"> <i class="bi bi-trash"></i>
                    Hapus</button>';
                    return '<div class="d-flex align-items-center gap-2">' . $btn . '</div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'titlePage' => 'Tambah Kategori',
            'infoPage' => 'Anda dapat menambahkan kategori disini'
        ];

        return view('pages.admin.category.input', $data, ['category' => new Category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }

        Category::create($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Kategori berhasil ditambahkan',
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
        $category = Category::findOrFail($id);
        $data = [
            'titlePage' => 'Edit Kategori',
            'infoPage' => 'Anda dapat mengubah kategori disini',
        ];

        return view('pages.admin.category.input', $data, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }

        $category->update($request->all());
        return response()->json([
            'alert' => 'success',
            'message' => 'Kategori berhasil diubah',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kategori berhasil dihapus',
        ]);
    }

    public function reorder(Request $request)
    {
        foreach ($request->input('rows', []) as $row) {
            Category::findOrFail($row['id'])->update([
                'position' => $row['position']
            ]);
        }
        return response()->json([
            'alert' => 'success',
            'message' => 'Galeri berhasil diurutkan',
        ]);
    }
}
