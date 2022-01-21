<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
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
}
