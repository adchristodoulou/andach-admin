<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
    	$attributes = ProductAttribute::all();

    	return view('product.create', ['attributes' => $attributes]);
    }

    public function edit($id)
    {
    	$product = Product::find($id);
    	$attributes = ProductAttribute::all();

    	return view('product.edit', ['product' => $product, 'attributes' => $attributes]);
    }

    public function index()
    {
    	$products = Product::all();

    	return view('product.index', ['products' => $products]);
    }

    public function store(Request $request)
    {
    	$product = new Product($request->all());
    	$product->save();
    	$product->setAllowedAttributes($request->input('attributes'));

    	session()->flash('success', 'yuay');

    	return redirect()->route('product.index');
    }

    public function update(Request $request)
    {
        $product = Product::find($request->input('id'));

        switch ($request->action)
        {
            case 'addvariation' :
                if ($product->addVariation($request->all()))
                {
                    session()->flash('success', 'Variation Added Successfully');
                } else {
                    session()->flash('danger', 'Variation not added. Does a combination exist already?');
                }
                break;

            case 'editproduct' :

                break;
        }

        return redirect()->route('product.edit', $product->id);
    }
}
