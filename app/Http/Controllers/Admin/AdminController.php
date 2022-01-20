<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login()
    {
        return view('backOffice.login');
    }

    public function index()
    {
        $manager = Manager::select(["full_name"])->where("id",auth()->guard("admin")->id())->get();
        $nbrClients = User::count();
        $nbrProducts = Product::count();
        return view('backOffice.dashboard')->with(["manager" => $manager,"nbrClients" => $nbrClients,"nbrProducts" => $nbrProducts]);
    }

    public function check(Request $request) {
        // inputs validation
        $request->validate([
            "email" => "required|email|exists:managers,email",
            "password" => "required|min:8"
        ],
        [
            "email.exists" => "cet email n'existe pas",
            "password.min" => "le mot de pass doit contien plus de 8 character"
        ]);

        if(Auth::guard("admin")->attempt($request->only(["email", "password"]))){
            return redirect()->route("admin.dashboard");
        }else{
            return redirect()->route("admin.login")->with("fail", "merci de verifier vos informations d'authentification");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return  redirect("admin/login");
    }


}
