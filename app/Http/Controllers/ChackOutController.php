<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Order;
use App\Models\OrderProducts;
use Illuminate\Http\Request;

class ChackOutController extends Controller
{
    function index(){

        $cartItems = session()->get("cartItems") ?? [];
        $totalPrice = 0;
        foreach ($cartItems as $item){
            $totalPrice += ($item["price"] - ($item["price"]*$item["discount"])/100 ) * $item["quantity"];
        }

        return view("frontOffice.checkout")->with(["cartItems" => $cartItems,"totalPrice" => $totalPrice]);
    }

    function makeOrder(Request $request){

        $request->validate([
            "first_name"         => "required",
            "last_name"          => "required",
            "country"            => "required",
            "street_address"     => "required",
            "city"               => "required",
            "zip"                => "required",
            "email"              => "required",
            "phone"              => "required",
            "notes"              => "required",
        ]);


        $cartItems = session()->get("cartItems") ?? [];
        $totalPrice = 0;
        foreach ($cartItems as $item){
            $totalPrice += ($item["price"] - ($item["price"]*$item["discount"])/100 ) *  $item["quantity"];
        }

        $order = new Order();
        $order->total = $totalPrice;
        $order->save();

        foreach ($cartItems as $item){
            $orderProducts = new OrderProducts();
            $orderProducts->order_id = $order->id;
            $orderProducts->product_id = $item["product"];
            $orderProducts->quantity = $item["quantity"];
            $orderProducts->save();
        }

        $billing = new Billing();
        $billing->first_name = $request->first_name;
        $billing->last_name = $request->last_name;
        $billing->country = $request->country;
        $billing->country = $request->country;
        $billing->street_address = $request->street_address;
        $billing->second_street_address = $request->second_street_address;
        $billing->city = $request->city;
        $billing->zip = $request->zip;
        $billing->email = $request->email;
        $billing->email = $request->email;
        $billing->phone = $request->phone;
        $billing->notes = $request->notes;
        $billing->order_id = $order->id;
        $billing->save();
    }

}
