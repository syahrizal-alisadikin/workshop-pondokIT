<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $products = Product::paginate(10);
        $categories = Category::paginate(5);
        return view('frontend.home', [
            "products" => $products,
            "categories" => $categories
        ]);
    }

    public function category()
    {
        $categories = Category::paginate(5);

        return view('frontend.category', compact('categories'));
    }

    public function categoryDetail($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $categories = Category::paginate(5);
        $products = Product::where('category_id', $category->id)->paginate(10);

        return view('frontend.category_detail', compact('category', 'categories', 'products'));
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('frontend.product_detail', compact('product'));
    }
}
