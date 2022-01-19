<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view("backOffice.categories.categories")->with(["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backOffice.categories.newCategoryForm");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "description" => "required",
            ],
            [
                "name.required" => "le nom du catégorie est obligatoir",
                "description.required" => "la description du catégorie est obligatoir",
            ]
        );

        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route("create.category")->withErrors($errors)->withInputs($request->all());
        }else{
            Category::create([
                "name"           => $request->name,
                "description"    => $request->description
            ]);
            return redirect()->route("index.category")->with([ 'success' => 'votre catégorie a été ajouter'] );
        }

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
        $category = Category::find($id);
        return view("backOffice.categories.editCategoryForm")->with(['category' => $category]);
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
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "description" => "required",
            ],
            [
                "name.required" => "le nom du catégorie est obligatoir",
                "description.required" => "la description du catégorie est obligatoir",
            ]
        );

        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route("create.category")->withErrors($errors)->withInputs($request->all());
        }else{
            $category = Category::find($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect()->route("index.category")->with([ 'success' => 'votre catégorie a été modifier'] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Category::find($id)->delete()){
            echo "success";
        }else{
            echo "error";
        }

    }
}
