<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\UploadController;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    ##################################### Profile begin ###################################################

    public function profile()
    {
        return view("backOffice.manager.settings");
    }

    public function updateGeneral(Request $request) {
        $request->validate([
                "full_name" => "required",
                "email"     => "required",
                "address"   => "max:255",
                "Phone"     => "max:20",
            ],
            [
                "full_name.required" => "le champ nom et Prenom est obligatoite",
                "full_name.max"      => "le champ nom et Prenom ne peut pas depasser 100 caracteres",

                "email.required"     => "le champ Email est obligatoite",
                "email.email"        => "le champ Email doit respecter la structure des emails",

                "address.max"        => "l'Address ne peut pas depasser 255 caracteres",

                "Phone.max"          => "le champ Phone ne peut pas depasser 20 caracteres",
            ]);

        $manager = Manager::find(auth("admin")->user()->id);

        $manager->full_name  = $request->input("full_name");
        $manager->email      = $request->input("email");
        $manager->address    = $request->input("address");
        $manager->phone      = $request->input("phone");

        $manager->update();
        return redirect()->route("admin.managers.profile")->with(["success" => "Vos information general ont ete mises a jour avec succes"]);
    }

    public function resetPicture(Request $request) {

        $manager = Manager::find(auth("admin")->user()->id);

        if ($manager->picture !== "avatar.png"){
            unlink(asset("assets/uploads/mangers/" . $manager->picture));
        }
        $manager->picture  = "avatar.png";

        $manager->update();
        return redirect()->route("admin.managers.profile")->with(["success" => "Votre image de profile a ete mise a l'image par defaut"]);
    }

    public function changePicture(Request $request) {

        $manager = Manager::find(auth("admin")->user()->id);

        if ($manager->picture !== "avatar.png"){
            unlink(asset("assets/uploads/mangers/" . $manager->picture));
        }
        $manager->picture  = UploadController::managerPic($request);

        $manager->update();
        return redirect()->route("admin.managers.profile")->with(["success" => "Votre image de profile a ete mise a ajour par succes"]);
    }

    public function changePass(Request $request) {

        $manager = Manager::find(auth("admin")->user()->id);

        $request->validate([
            'password'         => 'required',
            'new_pass_confirm' => 'required_with:new_pass|same:new_pass',
            'new_pass'         => 'required|min:8',
        ]);

        if (!Hash::check($request->input("password"), $manager->password)){
            return redirect()->back()->withErrors(["password" => "merci de verifier votre mot de pass et de ressayer plus tard"]);
        }

        $manager->password  = Hash::make($request->input("new_pass"));

        $manager->update();
        return redirect()->route("admin.managers.profile")->with(["success" => "Votre mot de pass a ete mis a ajour par succes"]);
    }

    #####################################  Profile end ###################################################


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
        $request->validate([
                "full_name" => "required|max:100|unique:managers,full_name",
                "email"     => "required|email|unique:managers,email",
                "password"  => "required|min:8",
                "address"   => "max:255",
                "Phone"     => "max:20",
            ],
            [
                "full_name.required" => "le champ nom et Prenom est obligatoite",
                "full_name.max"      => "le champ nom et Prenom ne peut pas depasser 100 caracteres",
                "full_name.unique"   => "cet utilisateur existe deja dans la base de donnees",

                "email.required"     => "le champ Email est obligatoite",
                "email.email"        => "le champ Email doit respecter la structure des emails",
                "email.unique"       => "cet email existe deja",

                "password.required"  => "le mot de passe est obligatoite",
                "password.min"       => "le mot de passe ne peut pas etre compose de moins de 8 caracteres",

                "address.max"        => "l'Address ne peut pas depasser 255 caracteres",

                "Phone.max"          => "le champ Phone ne peut pas depasser 20 caracteres",
            ]);

        $manager = new Manager();

        $manager->full_name  = $request->input("full_name");
        $manager->email      = $request->input("email");
        $manager->password   = Hash::make($request->input("password"));
        $manager->address    = $request->input("address");
        $manager->phone      = $request->input("Phone");
        $manager->picture    = UploadController::managerPic($request);

        $manager->save();
        return redirect()->route("admin.managers.display")->with(["success" => "vous avez ajoute votre manager avec succes"]);
    }

    public function delete(Request $request)
    {
        $manager = Manager::find($request->input("id"));
        $image_path = public_path("uploads/managers/avatars/{$manager->picture}");
        unlink($image_path);

        $manager->delete();

        return redirect()->route("admin.managers.display")->with(["success" => "vous avez supprimer votre manager avec succes"]);
    }

    public function changeRole(Request $request) {
        $manager = Manager::find($request->input("id"));
        $manager->role = $request->input("role");

        $manager->Update();
        return redirect()->route("admin.managers.display")->with(["success" => "Role modifie avec succes"]);
    }
}
