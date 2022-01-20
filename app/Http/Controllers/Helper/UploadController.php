<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public static function managerPic(Request $request)
    {

        $file=$request->file('images')[0];
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = "manager-".uniqid(time()).".".$extension;
        $file->move('uploads/managers/avatars/',$filename);

        return $filename;
    }
}
