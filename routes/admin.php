<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Admin\ProductController;
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



############################## Managers Login Routes Begin ###################################################################
Route::namespace("Admin")->prefix("admin")->name("admin.")->group(function () {

        Route::middleware("guest:admin")->namespace("Auth")->group(function () {
            Route::get("login", [AdminController::Class, "login"])->name("login");
            Route::post("check", [AdminController::Class, "check"])->name("check");
        });

        Route::get("logout", [AdminController::Class, "logout"])->name("logout");

    ############################## Managers Login Routes End #####################################################################

    #############################    Managers Tasks Begin    #####################################################################
    Route::middleware("auth:admin")->group(function () {

        Route::get("dashboard", [AdminController::Class, "index"])->name("dashboard");
        Route::get("management/categories", [CategoryController::Class, "index"])->name("index.category");

        Route::get("profile", [ManagerController::Class, "profile"])->name("managers.profile");
        Route::post("update/general", [ManagerController::Class, "updateGeneral"])->name("update.general");
        Route::post("picture/reset", [ManagerController::Class, "resetPicture"])->name("picture.reset");
        Route::post("picture/change", [ManagerController::Class, "changePicture"])->name("picture.change");
        Route::post("changePass", [ManagerController::Class, "changePass"])->name("change_password");

        #################################   Super Admin Tasks Begin    ###########################################################
        Route::middleware(["auth:admin", "isSuper"])->prefix("managers")->group(function () {

            Route::get("/", [ManagerController::Class, "display"])->name("managers.display");
            Route::get("add", [ManagerController::Class, "add"])->name("managers.add");
            Route::post("insert", [ManagerController::Class, "insert"])->name("managers.insert");
            Route::post("delete", [ManagerController::Class, "delete"])->name("managers.delete");
            Route::post("changeRole", [ManagerController::Class, "changeRole"])->name("managers.changeRole");

        });
        #################################   Super Admin Tasks End    #############################################################

        #################################   Editor Tasks Begin    ################################################################
        Route::middleware(["auth:admin", "isEditor"])->group(function () {

            Route::get("management/create-category", [CategoryController::Class, "create"])->name("create.category");
            Route::post("management/store-category", [CategoryController::Class, "store"])->name("store.category");
            Route::get("management/edit-category/{id}", [CategoryController::Class, "edit"])->name("edit.category");
            Route::post("management/update-category/{id}", [CategoryController::Class, "update"])->name("update.category");
            Route::get("management/destroy-category/{id}", [CategoryController::Class, "destroy"])->name("destroy.category");

        });
        #################################   Editor Tasks Begin    ################################################################

        #################################   Moderator Tasks Begin  ###############################################################

            Route::prefix("products")->group(function (){

                Route::get("/all-products",[ProductController::class,"index"])->name("index.product");
                Route::get("/new-product",[ProductController::class,"create"])->name("create.product");
                Route::post("/store-product",[ProductController::class,"store"])->name("store.product");
                Route::get("/edit-product/{id}",[ProductController::class,"edit"])->name("edit.product");
                Route::post("/update-product/{id}",[ProductController::class,"update"])->name("update.product");
                Route::get("/destroy-product/{id}",[ProductController::class,"destroy"])->name("destroy.product");
                Route::get("/visibility-product/{id}",[ProductController::class,"makeItVisible"])->name("visibility.product");
                Route::get("/search-product",[ProductController::class,"searchProduct"])->name("search.product");
            });

        #################################   Moderator Tasks End    ###############################################################


    });
    #############################    Managers Tasks End    #######################################################################
});
