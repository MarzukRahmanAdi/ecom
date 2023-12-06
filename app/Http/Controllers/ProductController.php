<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function product(Request $request)
    {
        $sortOption = $request->input('sort_option', 'asc');

        if ($sortOption == 'asc') {
            $products = Product::orderBy('price')->get();
        } else {
            $products = Product::orderByDesc('price')->get();
        }

        return view('product', compact('products', 'sortOption'));
    }

    public function sortByPriceRange(Request $request)
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

        return view('product', compact('products'));
    }

    public function sortByPrice()
    {
        $sortOption = Request::get('sort_option', 'asc');
        $products = Product::orderBy('price', $sortOption)->get();

        return view('products.index', compact('products'));
    }

}
