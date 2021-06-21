<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('list', [
            'products' => $products,
        ]);
    }

    public function getCart(Request $request){
        if ($request->ajax()) {
            return $request->id;
        }
        $productsInCart = session()->get('products',[]);
        $products = [];
            $productsI = Product::find(array_keys($productsInCart));
            foreach ($productsI as $product) {
                $product->quantity = $productsInCart[$product->id];
            }
            $products = $productsI;
        return view('cart', [
            'products' => $products
        ]);
    }

    public function addToCart(Request $request){
        try {
            $request->validate([
                'id' => 'required|integer|min:1',
//                'quantity' => 'required|integer|min:1',
            ]);
        } catch (ValidationException $e){
            return response()->json('Bad request', 400);
        }
        $id = $request['id'];
        if (!Product::find($id)) return response()->json('Not Found',404);
        $products = session()->get('products', []);
        if (isset($request['quantity'])) {
            $products[$id] = $request->quantity;
        } else {
            $products[$id] = 0;
        }
        session()->put('products',$products);
        return response()->json('Product successfully added', 201);
    }

    public function removeFromCart(Request $request) {
        $products = session()->get('products', []);
        if (!isset($products[$request->id])) {
            return response()->json('Bad Request', 400);
        }
        unset($products[$request->id]);
        session()->put('products',$products);
        return response()->json('Product succesfully deleted', 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product',[
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
