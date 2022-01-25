<?php

namespace App\Http\Controllers;

use App\Models\Favory;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favory::with(["products"])->where("user_id", auth()->user()->id)->first();
//        echo "<pre>";
//        print_r($favorites[0]->products[0]->pictures[0]->name);
//        echo "</pre>";
        return view("frontOffice.favorite")->with(["favorites" => $favorites]);
    }

    public function addToFavorite($productID)
    {
        $favorite = Favory::where("user_id", auth()->user()->id)->first();
        if (is_null($favorite)) {
            $favorite = Favory::create([
                "user_id" => auth()->user()->id
            ]);
        }

        $favorite->products()->attach($productID);

        return "ok";
    }

    public function deleteFromFavorite($productID)
    {
        $favorite = Favory::where("user_id", auth()->user()->id)->first();

        if (is_null($favorite)) {
            return "not_exist";
        }

        $favorite->products()->detach($productID);

        return "ok";
    }
}
