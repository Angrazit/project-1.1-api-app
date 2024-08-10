<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        // $cart = Cart::get();
        return response()->json([$cart]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $request->product_id;
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json([$cart, 'message' => 'Successfully added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json(['message' => $cart]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->delete();
        return response()->json(['message' => "Successfully destroy"]);
    }
}
