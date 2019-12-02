<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\ArticleModel;

class ArticleController extends Controller
{
    public function index(){
        $data['data'] = ArticleModel::select('*')
        ->where("delete_status", "0")
        ->get();

        // echo "<pre>";
        //     print_r($data['data']);die();

        return view("modules/article", $data);
    }

    public function add(Request $request){
        echo $request['title_article']."<br />";
        echo $request['content_article']."<br />";

        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        // $this->validate($request, [
		// 	'title_article' => 'required',
        //     'content_article' => 'required',
        //     'image_article' => 'required'
		// ]);
 
		// menyimpan data file yang diupload ke variabel $file
        $file = $request->file('image_article');
        
        // var_dump($request->file('image_article'));

        // die();
 
      	// nama file
		echo 'File Name: '.$gen."-".$file->getClientOriginalName();
		echo '<br>';
 
      	// ekstensi file
		echo 'File Extension: '.$file->getClientOriginalExtension();
		echo '<br>';
 
      	// real path
		echo 'File Real Path: '.$file->getRealPath();
		echo '<br>';
 
      	// ukuran file
		echo 'File Size: '.$file->getSize();
		echo '<br>';
 
      	// tipe mime
        echo 'File Mime Type: '.$file->getMimeType();
        echo "<br />";
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/images/';
        
        echo $tujuan_upload;
 
        // upload file
        // $file->move($tujuan_upload,$gen."-".$file->getClientOriginalName());
        $file->move(base_path('assets/images'),$gen."-".$file->getClientOriginalName());
        
        die();
    }
}
