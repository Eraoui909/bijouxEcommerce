<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPictures;
use Faker\Core\File;
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
        $products = Product::with(["pictures","category","publishedBy"])->paginate(3);
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
            "description" => "required",

        ],
        [
            "name.required" => "Le nom de produit est obligatoire",
            "category_id.required" => "La catégorie de produit est obligatoire",
            "price.required" => "Le prix de produit est obligatoire",
            "stock.required" => "Le stock de produit est obligatoire",
            "description.required" => "Le nom de produit est obligatoire",
        ]);

        $product = new Product();
        $product->name =     $request->name;
        $product->category_id =     $request->category_id;
        $product->price =     $request->price;
        $product->discount =     $request->discount;
        $product->stock =     $request->stock;
        $product->description =     $request->description;
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product  = Product::with("pictures")->find($id);
        return view("backOffice.products.editProduct")->with(["categories" => $categories,"product" => $product]);
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
        $request->validate([
            "name" => "required",
            "category_id" => "required",
            "price" => "required|numeric",
            "discount" => "numeric",
            "stock" => "required|numeric",
            "description" => "required",

        ],
            [
                "name.required" => "Le nom de produit est obligatoire",
                "category_id.required" => "La catégorie de produit est obligatoire",
                "price.required" => "Le prix de produit est obligatoire",
                "stock.required" => "Le stock de produit est obligatoire",
                "description.required" => "Le nom de produit est obligatoire",
            ]);


        $product = Product::find($id);
        $product->name          =     $request->name;
        $product->category_id   =     $request->category_id;
        $product->price         =     $request->price;
        $product->discount      =     $request->discount;
        $product->stock         =     $request->stock;
        $product->description   =     $request->description;
        $product->published_by  =     auth()->guard("admin")->id();
        $product->save();


        return redirect()->route("admin.index.product")->with(["success" => "Le produit a été modifier avec succé"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product    = Product::find($id);
        $pics       = ProductPictures::where("product_id",$id)->get();
        foreach ($pics as $pic){
            $path = public_path("uploads/products/")."/".$pic->name;
            \Illuminate\Support\Facades\File::delete($path);
        }
        if($product->delete()){
            echo "success";
        }else{
            echo "error";
        };
    }

    public function makeItVisible($id){

        $product = Product::find($id);
        if($product->visibility == 0){
            $product->visibility = 1;
            $product->save();
        }else{
            $product->visibility = 0;
            $product->save();
        }
        return redirect()->route("admin.index.product")->with(["success" => "La visibilité de produit a été changer"]);

    }

    public function searchProduct(Request $request){
        $title = trim($request->search_product);
        if(empty($title)){
            return redirect()->route("admin.index.product");
        }else{
            $products = Product::with(["pictures","category","publishedBy"])->where("name","like","%".$title."%")->paginate(3);
            return view("backOffice.products.allProducts")->with(["products" => $products]);
        }
    }
}
