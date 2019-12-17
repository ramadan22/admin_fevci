<?php

namespace App\Http\Controllers\api\galery;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\GaleryModel;
use Config;

class GaleryController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
    }
    
    public function index(Request $request){
        $data = GaleryModel::select('*')
        ->where("delete_status", "0");
        
        if(!empty($request['OFFSET']) && $request['OFFSET'] != ""){
            $data->offset($request['OFFSET']);
        }

        if(!empty($request['LIMIT']) && $request['LIMIT'] != ""){
            $data->limit($request['LIMIT']);
        }

        $data = $data->get();

        if(count($data) > 0){
            $i = 0;

            $json['STATUS_CODE'] = "200"; 
            $json['MESSAGE']     = "Get Data galery";
            
            foreach($data as $row){
                // image directory
                $imageDirect                    = Config::get("constants.urlAssetsImages")."galery/image/".@$row['image_galery'];
                $imageDirectThumbnail           = Config::get("constants.urlAssetsImages")."galery/thumbnail/".@$row['thumbnail_galery'];

                $json['DATA'][$i]['Id']         = $row['id_galery'];
                $json['DATA'][$i]['Title']      = $row['title_galery'];
                $json['DATA'][$i]['Alt_image']  = $row['alt_galery'];
                $json['DATA'][$i]['Image']      = ($row['image_galery'] != "") ? ($imageDirect) : ("");
                $json['DATA'][$i]['Thumbnail']  = ($row['thumbnail_galery'] != "") ? ($imageDirectThumbnail) : ("");
                $json['DATA'][$i]['created']    = $row['created_date']->toDateTimeString();

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
