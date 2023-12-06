<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{

    public function edit($id)
    {
        $product = Product::find($id);
       
    }

    public function update(Request $request, $id)
    {
       
       
    }

}
