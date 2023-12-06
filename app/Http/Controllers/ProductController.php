<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('index', compact('products'));
    }

    public function sortByPriceRange($minPrice, $maxPrice)
    {
        $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        return view('products.index', compact('products'));
    }

}
