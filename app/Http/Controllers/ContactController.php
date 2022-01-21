<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function inbox () {

        $messages = Contact::all();
        return view("backOffice.inbox", compact("messages"));
    }

    public function send (Request $request) {
        $request->validate(
            [
                "full_name"   => "required|max:50",
                "email"       => "required|email",
                "subject"     => "required|max:100",
                "message"     => "required",
            ],
            [
                "full_name.required" => "votre nom est obligatoir",
                "full_name.max"      => "votre nom ne doit pas depasser 50 caracteres",
                "email.required"     => "votre email  obligatoir",
                "email.email"        => "merci d'entrer un email valide",
                "subject.required"   => "le sujet est  obligatoir",
                "subject.max"        => "le sujet ne doit pas depasser 100 caracteres",
                "message.required"   => "le message est  obligatoir",
            ]
        );

        Contact::create([
            "full_name"    => $request->full_name,
            "email"        => $request->email,
            "subject"      => $request->subject,
            "message"      => $request->message,
        ]);
        return "ok";
    }

    public function delete(Request $request)
    {
        $manager = Contact::find($request->input("id"));
        $manager->delete();

        return "ok";
    }

    public function setRead(Request $request)
    {
        $manager = Contact::find($request->input("id"));
        $manager->state = 1;
        $manager->update();

        return "ok";
    }
}
