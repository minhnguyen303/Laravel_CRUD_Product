<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->save();

        return response()->json($product);
    }

    public function update($id, Request $request)
    {
        DB::table('products')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc
        ]);

        $product = Product::find($id);

        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json("ok");
    }
}
