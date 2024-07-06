<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->query('category_id');
        if ($category_id) {
            $products = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        }

        $categories = Category::all();

        return view('page.home', [
            'title' => 'Halaman Home',
            'products' => $products,
            'categories' => $categories,
            'selected_category_id' => $category_id,
        ]);
    }

    public function detailProduct($id){
        $data = Product::findorFail($id);
        return view('page.detail-product', [
            'title' => 'Halaman Detail Product',
            'data' => $data,
        ]);
    }
}
