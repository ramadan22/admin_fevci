<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\AccessModel;

class AccessController extends Controller
{
    public function access($token){
        $data = json_decode(AccessModel::select('*')
        ->where('token', $token)
        ->first());

        if($data == ""){
            $json['STATUS_CODE']    = "401"; 
            $json['MESSAGE']        = "Authentication is required and has failed";
            $json['DATA']           = array();

            echo json_encode($json);

            die();
        }
    }
}
