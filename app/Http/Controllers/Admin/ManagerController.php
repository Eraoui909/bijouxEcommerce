<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function display()
    {
        $managers = Manager::where("role", ">", 0)->get();
        return view("backOffice.manager.display", compact("managers"));
    }

    public function add()
    {
        return view("backOffice.manager.add");
    }

    public function insert(Request $request)
    {
        $manager = new Manager();

        $manager->full_name  = $request->input("full_name");
        $manager->email      = $request->input("email");
        $manager->password   = Hash::make($request->input("password"));
        $manager->address    = $request->input("address");
        $manager->phone      = $request->input("Phone");
//        echo $manager->picture    = UploadController::savePics($request, "managers", $request->input("full_name")) ? UploadController::savePics($request, "managers", $request->input("full_name"))[0] : "avatar.png";
        $manager->picture    = "avatar.png";

        $manager->save();
        return redirect("admin/managers");
    }

    public function delete(Request $request)
    {
        $manager = Manager::find($request->input("id"));
        $manager->delete();

        return redirect("admin/managers");
    }

    public function changeRole(Request $request) {
        $manager = Manager::find($request->input("id"));
        $manager->role = $request->input("role");

        $manager->Update();
        return redirect("admin/managers");
    }
}