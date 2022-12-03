<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;
use DataTables;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $category = Category::query()->latest();
            return DataTables()->of($category)
                ->addIndexColumn()
                ->editColumn('image', function ($category) {
                    return '<img src="' . asset('storage/category/' . $category->image) . '" width="100px">';
                })
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <a href="' . route('category.edit', $item->id) . '" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="' . route('category.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() . '
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    ';
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $validate['slug'] = Str::slug($request->name);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/category', $image->hashName());
        $validate['image'] = $image->hashName();

        // create ke database
        Category::create($validate);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //update data
        $validate = $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ]);



        $validate['slug'] = Str::slug($request->name);

        // upload image
        if ($request->file('image') == "") {
            $validate['image'] = $category->image;
        } else {
            // hapus old image
            Storage::delete('public/category/' . $category->image);
            // upload new image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());
            $validate['image'] = $image->hashName();
        }

        $category->update($validate);

        // redirect
        return to_route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // hapus image
        Storage::delete('public/category/' . $category->image);
        // hapus data
        $category->delete();

        return to_route('category.index')->with('success', 'Category deleted successfully');
    }
}
