<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);

        $product = Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'imageLink' => '/uploads/'.$imageName,
        ]);

        return redirect()->route('admin.products.edit', $product->id)
            ->with('success', 'Product added successfully');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $product->update(['imageLink' => '/uploads/'.$imageName]);
        }

        $product->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.products.edit', $product->id)
            ->with('success', 'Product updated successfully');
    }
}
