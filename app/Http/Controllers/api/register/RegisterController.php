<?php

namespace App\Http\Controllers\api\register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\RegisterModel;
use Config;
use Image;

class RegisterController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
    }

    public function index(Request $request){
        // echo $request['FULL_NAME']."<br />";
        // echo $request['NICK_NAME']."<br />";
        // echo $request['ADDRESS']."<br />";
        // echo $request['PLACE_OF_BIRTH']."<br />";
        // echo $request['BIRTH_OF_DATE']."<br />";
        // echo $request['DOMICILE_ADDRESS']."<br />";
        // echo $request['NRA_NUMBER']."<br />";
        // echo $request['POLICE_NUMBER']."<br />";
        // echo $request['PRODUCTION_YEAR']."<br />";
        // echo $request['TYPE']."<br />";
        // echo $request['MOTIVATION']."<br />";
        // echo $request['SUGGESTION']."<br />";
        // echo $request['IMAGE']."<br />";

        $imageName = $this->uploadImage($request['IMAGE']);

        $data = RegisterModel::insert([
            'full_name' => $request['FULL_NAME'],
            'nick_name' => $request['NICK_NAME'],
            'address' => $request['ADDRESS'],
            'place_of_birth' => $request['PLACE_OF_BIRTH'],
            'birth_of_date' => $request['BIRTH_OF_DATE'],
            'domicile_address' => $request['DOMICILE_ADDRESS'],
            'nra_number' => $request['NRA_NUMBER'],
            'police_number' => $request['POLICE_NUMBER'],
            'production_year' => $request['PRODUCTION_YEAR'],
            'type' => $request['TYPE'],
            'motivation' => $request['MOTIVATION'],
            'suggestion' => $request['SUGGESTION'],
            'image' => $imageName,
            'created_date' => date('Y-m-d H:i:s'),
            'delete_status' => "0"
        ]);

        if($data){
            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE']     = "Register Data Success";
            $json['DATA']        = array();
        } else {
            $json['STATUS_CODE'] = "202"; 
            $json['MESSAGE']     = "Data not Found !";
            $json['DATA']        = array();
        }

        return json_encode($json);
    }

    public function uploadImage($file){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

      	// isi dengan nama folder tempat kemana file diupload
        $pathImage = base_path('assets/images/register');
 
        // upload file
        $file->move($pathImage, $gen."-".$file->getClientOriginalName());

        return $gen."-".$file->getClientOriginalName();
    }

    // public function uploadImage($file){
    //     $gen = date("Y-m-d H-i-s");
    //     $gen = str_replace(" ", "", str_replace("-", "", $gen));

    //     $pathImage = base_path('assets/images/register');

    //     $explodeParent = explode(';', $file);
    //     $explodeTypeData = explode('/', $explodeParent[0]);

    //     if($explodeTypeData[0] == 'data:image'){
    //         $type = $explodeTypeData[1];
    //         $image = str_replace('data:image/'.$type.';base64,', '', $file);
    //         $image = str_replace(' ', '+', $image);
    //         $imageName = $gen.".".$type;

    //         file_put_content($pathImage.'/'.$imageName, base64_decode($file));
    //     }


    //   	die();
    // }
}
