<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->name;

        if ($keyword) {
            $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $products = Product::all();
        }

        return view(
            'index',
            compact('products')
        );
    }
}
