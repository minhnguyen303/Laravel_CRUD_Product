<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
//        $products = Product::paginate(10);
        $products = DB::table('products')->paginate(10);
        return view('index', compact(['products']));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;

        $product->save();
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit', compact(['product']));
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;

        $product->save();
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('show', compact(['product']));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back();
    }
}
