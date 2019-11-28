<?php

namespace App\Http\Controllers\api\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\AboutModel;

class AboutController extends Controller
{
    public function __construct(Request $request){
        $data = $request->header();
        $AccessController = new AccessController;
        return $AccessController->access($data['apptoken'][0]);
	}

    public function index(){
        $aboutus = AboutModel::select("*")
        ->where("delete_status", "0")
        ->first();

        // echo "<pre>";
        //     print_r($aboutus);die();

        if($aboutus != ""){
            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE'] = "Get Data About Us";
            $json['DATA']['Title'] = $aboutus['title_aboutus'];
            $json['DATA']['Content'] = $aboutus['content_aboutus'];
        } else {
            $json['STATUS_CODE'] = "202"; 
            $json['MESSAGE'] = "Data not Found !";
            $json['DATA'] = array();
        }

        return json_encode($json);
    }
}
