<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() 
    {
        $products = Product::all();
        return Inertia::render('Products/index', ['products' => $products]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return back();
    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
