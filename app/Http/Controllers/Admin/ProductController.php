<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPictures;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(["pictures","category","publishedBy"])->get();
        return view("backOffice.products.allProducts")->with(["products" => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("backOffice.products.newProduct")->with(["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!$request->has("images")){
            return redirect()->back()->with(["error"=>"les photos sont obligatoire"]);
        }
        $request->validate([
            "name" => "required",
            "category_id" => "required",
            "price" => "required|numeric",
            "discount" => "numeric",
            "stock" => "required|numeric",
            "description" => "required"
        ],
        [
            "name.required" => "Le nom de produit est obligatoire",
            "category_id.required" => "La catégorie de produit est obligatoire",
            "price.required" => "Le prix de produit est obligatoire",
            "stock.required" => "Le stock de produit est obligatoire",
            "description.required" => "La description de produit est obligatoire",
        ]);

        $product = new Product();

        $product->name         =     $request->name;
        $product->category_id  =     $request->category_id;
        $product->price        =     $request->price;
        $product->discount     =     $request->discount;
        $product->stock        =     $request->stock;
        $product->description  =     $request->description;
        $product->published_by =     auth()->guard("admin")->id();

        $product->save();

        $pictures = UploadController::productPics($request);

        foreach ($pictures as $picture){
            $productPics = new ProductPictures();
            $productPics->name = $picture;
            $productPics->product_id = $product->id;
            $productPics->save();
        }


        return redirect()->route("admin.index.product")->with(["success" => "Le produit a été ajouter avec succé"]);

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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
