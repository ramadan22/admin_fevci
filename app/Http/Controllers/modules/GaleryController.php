<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\GaleryModel;
use Config;
use Session;
use Image;

class GaleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = GaleryModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data'] = GaleryModel::select('*')
        ->orderBy('id_galery', 'desc')
        ->limit($limit)
        ->offset($offset)
        ->where("delete_status", "0")
        ->get();

        $data['limit'] = $limit;

        return view("modules/galery", $data);
    }

    public function add(Request $request){
        if(!empty($request->file('image_galery'))){
            $file = $this->uploadImage($request->file('image_galery'), "");
        } else {
            $file = "";
        }
        
        $data = GaleryModel::insert(["title_galery" => $request['title_galery'], "alt_galery" => $request['alt_galery'], "thumbnail_galery" => $file, "image_galery" => $file, "delete_status" => "0", "created_date" => date("Y-m-d H:i:s")]);
        
        Session::flash('note', 'Success add data galery'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function formEdit(Request $request){
        $data = GaleryModel::select('*')
        ->where("delete_status", "0")
        ->where("id_galery", $request["id"])
        ->first();

        return json_encode($data);
    }

    public function update(Request $request){
        if(!empty($request->file('image_galery'))){
            $file = $this->uploadImage($request->file('image_galery'), $request['data_image']);
        } else {
            $file = $request['data_image'];
        }

        $data = GaleryModel::where("id_galery", $request['id_galery'])
        ->update(["title_galery" => $request['title_galery'], "alt_galery" => $request['alt_galery'], "image_galery" => $file, "thumbnail_galery" => $file]);

        Session::flash('note', 'Success update data galery'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function delete(Request $request){
        $data = GaleryModel::where("id_galery", $request['id'])->update(["delete_status" => "1"]);
        
        Session::flash('note', 'Success delete data galery'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function uploadImage($file, $removeFile){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        $fileName = str_replace(" ", "-", $file->getClientOriginalName());

        if(!empty($removeFile)){
            $fileData = Config::get("constants.pathImage")."galery/image/".$removeFile;
            $fileData2 = Config::get("constants.pathImage")."galery/thumbnail/".$removeFile;
            if(file_exists($fileData) && file_exists($fileData2)){
                unlink($fileData);
                unlink($fileData2);
            }
        }

        $height = Image::make($file)->height();
        $width = Image::make($file)->width();
 
      	// isi dengan nama folder tempat kemana file diupload
        $pathImage = base_path('assets/images/galery');
 
        // upload file
        $file->move($pathImage."/image", $gen."-".$fileName);

        // thumbnail
        $thumbnailPath = base_path('assets/images/galery/image/'.$gen."-".$fileName);
        $img = Image::make($thumbnailPath)->crop(325, 225);
        $img->save($pathImage."/thumbnail/".$gen."-".$fileName);

        return $gen."-".$fileName;
    }
}
