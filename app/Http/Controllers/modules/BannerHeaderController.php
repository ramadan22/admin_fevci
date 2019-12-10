<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\BannerHeaderModel;
use Config;
use Session;
use Image;

class BannerHeaderController extends Controller
{
    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = BannerHeaderModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data2'] = $this->getDataDefault();

        $data['data'] = $this->getData("", $limit, $offset);

        $data['limit'] = $limit;

        return view("modules/manage_content/banner_header", $data);
    }

    public function formEdit(Request $request){
        $data = BannerHeaderModel::select('*')
        ->where("delete_status", "0")
        ->where("id_banner_header", $request["id"])
        ->first();

        return json_encode($data);
    }

    public function update(Request $request){
        if(!empty($request->file('image_banner_header'))){
            $file = $this->uploadImage($request->file('image_banner_header'), $request['data_image']);
        } else {
            $file = $request['data_image'];
        }

        $data = BannerHeaderModel::where("id_banner_header", $request['id_banner_header'])
        ->update(["title_banner_header" => $request['title_banner_header'], "description_banner_header" => $request['description_banner_header'], "image_banner_header" => $file]);

        Session::flash('note', 'Success update data banner header'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function updateUseDefault(Request $request){
        $data = BannerHeaderModel::where("id_banner_header", $request['id_banner_header'])
        ->update(["use_default" => $request['use_default']]);

        if($request['use_default'] == "1"){
            return json_encode($this->getDataDefault());
        } else {
            return json_encode($this->getData("","",""));
        }

        // Session::flash('note', 'Success update data banner header change use default image'); 
        // return redirect()->back()->with(array('message' => '1'));
    }

    public function getData($id, $limit, $offset){
        $data = BannerHeaderModel::select('*')
        ->orderBy('id_banner_header', 'desc')
        ->where("delete_status", "0")
        ->where("status", "0");

        if($id != ""){
            $data->where('id_banner_header', $id);
        }

        if($limit != "" && $offset != ""){
            $data->limit($limit)->offset($offset);
        }

        return $data->get();
    }

    public function getDataDefault(){
        $defaultData = BannerHeaderModel::select('*')
        ->orderBy('id_banner_header', 'desc')
        ->where("delete_status", "0")
        ->where("status", "1")
        ->get();

        return $defaultData;
    }

    function uploadImage($file, $removeFile){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        if(!empty($removeFile)){
            $fileData = Config::get("constants.pathImage")."banner_header/".$removeFile;
            if(file_exists($fileData)){
                unlink($fileData);
            }
        }
 
        // $file = $request->file('image_article');
 
      	// nama file
		// echo 'File Name: '.$gen."-".$file->getClientOriginalName();
		// echo '<br>';
 
      	// ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';
 
      	// real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
 
      	// ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';
 
      	// tipe mime
        // echo 'File Mime Type: '.$file->getMimeType();
        // echo "<br />";
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/images/';
 
        // upload file
        // $file->move($tujuan_upload,$gen."-".$file->getClientOriginalName());
        $file->move(base_path('assets/images/banner_header'),$gen."-".$file->getClientOriginalName());

        return $gen."-".$file->getClientOriginalName();
    }
}
