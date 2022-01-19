<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backOffice.layout.panel');
});

Route::namespace("Admin")->prefix("admin")->name("admin.")->group(function () {

    Route::middleware("guest:admin")->namespace("Auth")->group(function () {
        Route::get("login", [AdminController::Class, "login"])->name("login");
        Route::post("check", [AdminController::Class, "check"])->name("check");
    });

    Route::middleware("auth:admin")->namespace("Auth")->group(function () {
        Route::get("dashboard", [AdminController::Class, "index"])->name("dashboard");
    });
});

