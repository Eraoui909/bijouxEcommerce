<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $cartItems = session()->get("cartItems") ?? [];
        $totalPrice = 0;
        foreach ($cartItems as $item){
            $totalPrice += ($item["price"] - ($item["price"]*$item["discount"])/100 );
        }

        return view("frontOffice.cart")->with(["cartItems" => $cartItems,"totalPrice" => $totalPrice]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cart_item =  [
            "product" => $request->product,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "discount" => $request->discount,
            "stock" => $request->stock,
            "name" => $request->name,
        ];

        $cartItems = $request->session()->get("cartItems") ?? [];

        $test = false;
        foreach ($cartItems as $item){
            if( $item["product"] == $cart_item["product"]){
                $test = true;
                break;
            }
        }
        if(!$test){
            $request->session()->push("cartItems", $cart_item);
        }

        return redirect()->route("cart.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $cartItems = session()->get("cartItems") ?? [];
        foreach ($cartItems as $counter => $item){
            if($item["product"] == $id){
                session()->remove("cartItems.".$counter) ;
            }
        }
        return redirect()->route("cart.index");
    }
}
