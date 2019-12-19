<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\AccessModel;
use Session;

class AccessController extends Controller
{
    public function access($token){
        $errors = Session::get('errors');

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

        if (!empty($errors)) {
            $json['STATUS_CODE']    = "400"; 
            $json['MESSAGE']        = "Bad request";
            $json['DATA']           = array();

            echo json_encode($json);

            die();
        }
    }
}
