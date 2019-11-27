<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\AboutModel;

class AboutController extends Controller
{
    public function index(){
        $data['aboutus'] = AboutModel::select("*")
        ->where("delete_status", "0")
        ->first();

        // echo "<pre>";
            // print_r($data['aboutus']);die();

        return view("modules/manage_content/aboutus", $data);
    }

    public function update(Request $request){
        $add = AboutModel::where("id_aboutus", $request['id_aboutus'])
        ->update(['content_aboutus' => $request['content_aboutus']]);

        return redirect()->back()->with(array('message' => 'success'));
    }
}
