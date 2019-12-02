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

        return view("modules/manage_content/aboutus", $data);
    }

    public function update(Request $request){
        $update = AboutModel::where("id_aboutus", $request['id_aboutus'])
        ->update(['content_aboutus' => $request['content_aboutus'], 'title_aboutus' => $request['title']]);

        return redirect()->back()->with(array('message' => 'success'));
    }
}
