<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;

class AdminMessagesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer("backOffice.layout.includes.navbar", function ($view){
           $view->with(["messages" => Contact::where("state",0)->orderBy("created_at","DESC")->get() , "nbrMessageNoVu" => Contact::where("state",0)->count() ]);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
