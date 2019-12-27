<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\MerchandiseModel;
use Config;
use Session;

class MerchandiseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }  
    
    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = MerchandiseModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data'] = MerchandiseModel::select('*')
        ->orderBy('id_merchandise', 'desc')
        ->limit($limit)
        ->offset($offset)
        ->where("delete_status", "0")
        ->get();

        $data['limit'] = $limit;

        return view("modules/merchandise", $data);
    }

    public function add(Request $request){
        if(!empty($request->file('image_merchandise'))){
            $file = $this->uploadImage($request->file('image_merchandise'), "");
        } else {
            $file = "";
        }
        
        $data = MerchandiseModel::insert(["name_merchandise" => $request['name_merchandise'], "description_merchandise" => $request['description_merchandise'], "price_merchandise" => $request['price_merchandise'], "image_merchandise" => $file, "delete_status" => "0", "created_date" => date("Y-m-d H:i:s")]);
        
        Session::flash('note', 'Success add data merchandise'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function formEdit(Request $request){
        $data = MerchandiseModel::select('*')
        ->where("delete_status", "0")
        ->where("id_merchandise", $request["id"])
        ->first();

        return json_encode($data);
    }

    public function update(Request $request){
        if(!empty($request->file('image_merchandise'))){
            $file = $this->uploadImage($request->file('image_merchandise'), $request['data_image']);
        } else {
            $file = $request['data_image'];
        }

        $data = MerchandiseModel::where("id_merchandise", $request['id_merchandise'])
        ->update(["name_merchandise" => $request['name_merchandise'], "description_merchandise" => $request['description_merchandise'], "price_merchandise" => $request['price_merchandise'], "image_merchandise" => $file]);

        Session::flash('note', 'Success update data merchandise'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function delete(Request $request){
        $data = MerchandiseModel::where("id_merchandise", $request['id'])->update(["delete_status" => "1"]);
        
        Session::flash('note', 'Success delete data merchandise'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function uploadImage($file, $removeFile){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        $fileName = str_replace(" ", "-", $file->getClientOriginalName());

        if(!empty($removeFile)){
            $fileData = Config::get("constants.pathImage")."merchandise/".$removeFile;
            if(file_exists($fileData)){
                unlink($fileData);
            }
        }
 
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
        $file->move(base_path('assets/images/merchandise'),$gen."-".$fileName);

        return $gen."-".$fileName;
    }
}
