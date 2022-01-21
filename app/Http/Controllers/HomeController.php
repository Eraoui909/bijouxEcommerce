<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::with(["pictures","category"])->limit(7)->get();
        /* echo "<pre>";
            print_r($products[0]->pictures[0]->name);
        echo "</pre>";
        die(); */
        return view('frontOffice.store')->with(["products" => $products]);
    }
}
