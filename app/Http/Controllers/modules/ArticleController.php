<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CheckPrivilegesController;
use App\models\modules\ArticleModel;
use Config;
use Session;
use Auth;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = ArticleModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data'] = ArticleModel::select('*')
        ->orderBy('id_article', 'desc')
        ->limit($limit)
        ->offset($offset)
        ->where("delete_status", "0")
        ->get();

        $data['limit'] = $limit;

        return view("modules/article", $data);
    }

    public function add(Request $request){
        if(!empty($request->file('image_article'))){
            $file = $this->uploadImage($request->file('image_article'), "");
        } else {
            $file = "";
        }
        
        $data = ArticleModel::insert(["title_article" => $request['title_article'], "content_article" => $request['content_article'], "image_article" => $file, "delete_status" => "0", "created_date" => date("Y-m-d H:i:s")]);
        
        Session::flash('note', 'Success add data article'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function formEdit(Request $request){
        $data = ArticleModel::select('*')
        ->where("delete_status", "0")
        ->where("id_article", $request["id"])
        ->first();

        return json_encode($data);
    }

    public function update(Request $request){
        if(!empty($request->file('image_article'))){
            $file = $this->uploadImage($request->file('image_article'), $request['data_image']);
        } else {
            $file = $request['data_image'];
        }

        $data = ArticleModel::where("id_article", $request['id_article'])
        ->update(["title_article" => $request['title_article'], "content_article" => $request['content_article'], "image_article" => $file]);

        Session::flash('note', 'Success update data article'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function delete(Request $request){
        $data = ArticleModel::where("id_article", $request['id'])->update(["delete_status" => "1"]);
        
        Session::flash('note', 'Success delete data article'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    function uploadImage($file, $removeFile){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        $fileName = str_replace(" ", "-", $file->getClientOriginalName());

        if(!empty($removeFile)){
            $fileData = Config::get("constants.pathImage")."articles/".$removeFile;
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
        $file->move(base_path('assets/images/articles'),$gen."-".$fileName);

        return $gen."-".$fileName;
    }
}
