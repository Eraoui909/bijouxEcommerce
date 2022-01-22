<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    #################################### Inscription begin ######################################

    public function subscribe(Request $request) {

        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|unique:newsletters,email"
            ],
            [
                "email.required" => "required",
                "email.unique"   => "exists",
            ]
        );

        if ($validator->fails()) {
            return $validator->errors()->getMessages()["email"][0];
        }

        Newsletter::create(["email" => $request->input("email")]);

        return "ok";

    }
    #################################### Inscription end ########################################

    #################################### Manager Tasks begin ####################################

    public function display()
    {
        $inscriptions = Newsletter::All();
        return view("backOffice.newsletter", compact("inscriptions"));
    }

    public function changeState(Request $request) {

        $newsletter = Newsletter::find($request->input("id"));
        $newsletter->state = $request->input("state");

        $newsletter->Update();

        return "ok";
    }

    #################################### Manager Tasks end ######################################



}
