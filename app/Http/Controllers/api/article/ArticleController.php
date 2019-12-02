<?php

namespace App\Http\Controllers\api\article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;
use App\models\modules\ArticleModel;

class ArticleController extends Controller
{
    public function __construct(Request $request){
        $data               = $request->header();
        $AccessController   = new AccessController;

        return $AccessController->access($data['apptoken'][0]);
	}

    public function index(){
        $data = ArticleModel::select('*')
        ->where("delete_status", "0")
        ->get();

        // echo "<pre>";
        //     print_r($article);die();

        if(count($data) > 0){
            $i = 0;

            $json['STATUS_CODE']        = "200"; 
            $json['MESSAGE']            = "Get Data Articles";
            foreach($data as $row){
                $json['DATA'][$i]['Title']      = $row['title_article'];
                $json['DATA'][$i]['Image']      = $row['image_article'];
                $json['DATA'][$i]['Content']    = $row['content_article'];
                $json['DATA'][$i]['created']    = $row['created_date'];

                $i++;
            }
        } else {
            $json['STATUS_CODE']        = "202"; 
            $json['MESSAGE']            = "Data not Found !";
            $json['DATA']               = array();
        }

        return json_encode($json);
    }
}
