<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
       return view('product-page')->with(['id' => $id]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return new ProductResource($product);
    }
}
