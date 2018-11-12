<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return "sdfdsfdgs";
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('products.index', compact('products'));
        // although resource a index kisui receive kore na but we can stiill do that////////////
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'description' => 'required'
        ]);
        $product = new Product;
        $img = $request->image;
        $img_name = time() . $img->getClientOriginalName();
        $img->move('uploads/products', $img_name);
        $product->name = $request->name;
        $product->image = 'uploads/products' . $img_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        Session::flash('success', 'Product created successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', ['product' => Product::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        $product = Product::find($id);
        if ($request->hasFile('image')){
            //
            // old image delete
            if(file_exists($product->image)){
                unlink($product->image);
            }
            //
            $img = $request->image;
            $img_name = time() . $img->getClientOriginalName();
            $img->move('uploads/products', $img_name);
            $product->image = 'uploads/products' . $img_name;
            $product->save();
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        Session::flash('success', 'Product updated successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Product::find($id);
        if(file_exists($p->image)){
            unlink($p->image);
        }
        $p->delete();
        Session::flash('success', 'Product deleted successfully.');
        return redirect()->route('products.index');
    }
}
