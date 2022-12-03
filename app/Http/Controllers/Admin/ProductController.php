<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $product = Product::query()->with('category')->latest();
            return DataTables()->of($product)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    return '<img src="' . asset('storage/product/' . $data->image) . '" width="100px">';
                })
                ->editColumn('price', function ($data) {
                    return MoneyFormat($data->price);
                })
                ->editColumn('discount', function ($data) {
                    return $data->discount . '%';
                })
                ->addColumn('pricedis', function ($data) {
                    return  Discount($data->price, $data->discount);
                })
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <a href="' . route('product.edit', $item->id) . '" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="' . route('product.destroy', $item->id) . '" method="POST">
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

        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'discount' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            //upload image
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());
            $validated['image'] = $image->hashName();
            $validated['slug'] = Str::slug($request->name);
            // simpan data
            Product::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }

        return to_route('product.index')->with('success', 'Product created successfully');
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
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // validasi
        $validated =  $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'discount' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            // upload image
            if ($request->hasFile('image')) {
                // hapus image lama
                Storage::delete('public/product/' . $product->image);
                $image = $request->file('image');
                $image->storeAs('public/product', $image->hashName());
                $validated['image'] = $image->hashName();
            }
            $validated['slug'] = Str::slug($request->name);
            // update data
            $product->update($validated);
            DB::commit();
            return to_route('product.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //hapus image
        Storage::delete('public/product/' . $product->image);
        $product->delete();
        return to_route('product.index')->with('success', 'Product deleted successfully');
    }
}
