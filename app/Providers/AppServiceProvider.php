<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('frontOffice.layout.includes.header',function ($view){
            $categories = Category::select('id','name')->get();
            $cartItems = session()->get("cartItems") ?? [];
            $totalPrice = 0;
            $nbProduct = count($cartItems);
            foreach ($cartItems as $item){
                $totalPrice += ($item["price"] - ($item["price"]*$item["discount"])/100 );
            }
            $view->with(['categories' => $categories, "totalPrice" => $totalPrice, "nbProduct" => $nbProduct,"cartItems" => $cartItems ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
