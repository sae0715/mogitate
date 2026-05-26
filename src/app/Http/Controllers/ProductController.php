<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->name;
        $sort = $request->input('sort', 'default');

        $query = Product::query();

        if ($keyword) {
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }

        if ($sort === 'price_desc') {
            $query = $query->orderBy('price', 'desc');
        } elseif ($sort === 'price_asc') {
            $query = $query->orderBy('price', 'asc');
        }

        $products = $query->get();

        return view(
            'index',
            compact('products')
        );
    }
}
