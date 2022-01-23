<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChackOutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();


Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/home', [HomeController::class, "index"])->name('home');
Route::post('/contact', [ContactController::class, "send"])->name('contact');

Route::post('/newsletter', [NewsletterController::class, "subscribe"])->name('newsletter');

Route::get('/product/{id}', [HomeController::class, "singleProduct"])->name('single.product');


Route::prefix("cart")->name("cart.")->group(function (){
    Route::get("/", [CartController::class,"index"])->name("index");
    Route::post("/add-to-cart", [CartController::class,"store"])->name("store");
    Route::get("/delete-from-cart/{id}", [CartController::class,"destroy"])->name("destroy");
});

Route::prefix("checkout")->name("checkout.")->group(function (){
    Route::get("/", [ChackOutController::class,"index"])->name("index");
    Route::post("/order", [ChackOutController::class,"makeOrder"])->name("order");
});
