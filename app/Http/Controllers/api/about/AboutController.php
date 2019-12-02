<?php

namespace App\Http\Controllers\api\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\AboutModel;

class AboutController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
	}

    public function index(){
        $data = AboutModel::select("*")
        ->where("delete_status", "0")
        ->first();

        if($data != ""){
            $json['STATUS_CODE']        = "200"; 
            $json['MESSAGE']            = "Get Data About Us";
            $json['DATA']['Title']      = $data['title_aboutus'];
            $json['DATA']['Content']    = $data['content_aboutus'];
        } else {
            $json['STATUS_CODE']        = "202"; 
            $json['MESSAGE']            = "Data not Found !";
            $json['DATA']               = array();
        }

        return json_encode($json);
    }
}
