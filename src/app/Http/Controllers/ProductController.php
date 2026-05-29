<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\CreateRequest;

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

        $products = $query->paginate(6);

        return view(
            'index',
            compact('products')
        );
    }

    public function show($productId)
    {
        $product = Product::find($productId);

        return view(
            'show',
            compact('product')
        );
    }

    public function update(UpdateRequest $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('public/images');
            $product->image = basename($image);
        }
        $product->description = $request->description;
        $product->save();

        return redirect(
            '/products'
        );
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreateRequest $request)
    {
        $image = $request->file('image')->store('public/fruits-img');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => 'storage/fruits-img/' . basename($image),
            'description' => $request->description,
        ]);

        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('/products');
    }
}
