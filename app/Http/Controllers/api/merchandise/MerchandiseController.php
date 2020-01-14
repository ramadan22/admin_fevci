<?php

namespace App\Http\Controllers\api\merchandise;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\MerchandiseModel;
use Config;

class MerchandiseController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
    }
    
    public function index(Request $request){
        $data = MerchandiseModel::select('*')
        ->where("delete_status", "0");

        if(!empty($request['OFFSET']) && $request['OFFSET'] != ""){
            $data->offset($request['OFFSET']);
        }

        if(!empty($request['LIMIT']) && $request['LIMIT'] != ""){
            $data->limit($request['LIMIT']);
        }

        if(!empty($request['ID'])){
            $data->where("id_merchandise", $request['ID']);
        }

        $data = $data->get();

        if(count($data) > 0){
            $i = 0;

            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE']     = "Get Data Merchandise";
            
            foreach($data as $row){
                // image directory
                $imageDirect                     = Config::get("constants.urlAssetsImages")."merchandise/".@$row['image_merchandise'];

                $json['DATA'][$i]['Id']          = $row['id_merchandise'];
                $json['DATA'][$i]['Title']       = $row['name_merchandise'];
                $json['DATA'][$i]['Image']       = ($row['image_merchandise'] != "") ? ($imageDirect) : ("");
                $json['DATA'][$i]['Price']       = $row['price_merchandise'];
                $json['DATA'][$i]['Description'] = $row['description_merchandise'];
                $json['DATA'][$i]['created']     = $row['created_date']->toDateTimeString();

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
