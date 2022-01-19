<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function check(Request $request) {
        // inputs validation
        $request->validate([
            "email" => "required|email|exists:managers,email",
            "password" => "required|min:8"
        ],
        [
            "email.exists" => "cet email n'existe pas"
        ]);

        if(Auth::guard("admin")->attempt($request->only(["email", "password"]))){
            return redirect()->route("admin.dashboard");
        }else{
            return redirect()->route("admin.login")->with("fail", "merci de verifier vos informations d'authentification");
        }
    }
}
