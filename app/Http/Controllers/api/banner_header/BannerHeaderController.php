<?php

namespace App\Http\Controllers\api\banner_header;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\BannerHeaderModel;
use Config;

class BannerHeaderController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
    }
    
    public function index(Request $request){
        $data = BannerHeaderModel::select('*')
        ->where("key_name", $request['KEY_NAME'])
        ->where("delete_status", "0")
        ->where("status", "0")
        ->get();

        if(count($data) > 0){
            $i = 0;

            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE']     = "Get Data banner header";
            
            foreach($data as $row){
                // image directory
                $imageDirect                      = Config::get("constants.urlAssetsImages")."banner_header/".@$row['image_banner_header'];
                $getDataDefault                   = json_decode($this->default(), true);

                $json['DATA'][$i]['Id']           = $row['id_banner_header'];
                $json['DATA'][$i]['Title']        = $row['title_banner_header'];
                $json['DATA'][$i]['Description']  = $row['description_banner_header'];
                $json['DATA'][$i]['KeyName']      = $row['key_name'];
                $json['DATA'][$i]['Image']        = ($row['use_default'] != "1") ? ($imageDirect) : ($getDataDefault['DATA'][0]['Image']);
                $json['DATA'][$i]['created']      = $row['created_date']->toDateTimeString();

                $i++;
            }
        } else {
            $json['STATUS_CODE'] = "202"; 
            $json['MESSAGE']     = "Data not Found !";
            $json['DATA']        = array();
        }

        return json_encode($json);
    }

    public function default(){
        $data = BannerHeaderModel::select('*')
        ->where("delete_status", "0")
        ->where("status", "1")
        ->get();

        if(count($data) > 0){
            $i = 0;

            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE']     = "Get Data banner header";
            
            foreach($data as $row){
                // image directory
                $imageDirect                      = Config::get("constants.urlAssetsImages")."banner_header/".@$row['image_banner_header'];

                $json['DATA'][$i]['Id']           = $row['id_banner_header'];
                $json['DATA'][$i]['Description']  = $row['description_banner_header'];
                $json['DATA'][$i]['Image']        = ($row['use_default'] != "1") ? ($imageDirect) : ("");
                $json['DATA'][$i]['created']      = $row['created_date']->toDateTimeString();

                $i++;
            }
        } else {
            $json['STATUS_CODE'] = "202"; 
            $json['MESSAGE']     = "Data not Found !";
            $json['DATA']        = array();
        }

        return json_encode($json);
    }
}
