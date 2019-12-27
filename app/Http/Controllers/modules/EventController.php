<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\EventModel;
use Config;
use Session;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = EventModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data'] = EventModel::select('*')
        ->orderBy('id_event', 'desc')
        ->limit($limit)
        ->offset($offset)
        ->where("delete_status", "0")
        ->get();

        $data['limit'] = $limit;

        return view("modules/event", $data);
    }

    public function add(Request $request){
        if(!empty($request->file('image_event'))){
            $file = $this->uploadImage($request->file('image_event'), "");
        } else {
            $file = "";
        }
        
        $data = EventModel::insert(["title_event" => $request['title_event'], "content_event" => $request['content_event'], "image_event" => $file, "delete_status" => "0", "created_date" => date("Y-m-d H:i:s")]);
        
        Session::flash('note', 'Success add data event'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function formEdit(Request $request){
        $data = EventModel::select('*')
        ->where("delete_status", "0")
        ->where("id_event", $request["id"])
        ->first();

        return json_encode($data);
    }

    public function update(Request $request){
        if(!empty($request->file('image_event'))){
            $file = $this->uploadImage($request->file('image_event'), $request['data_image']);
        } else {
            $file = $request['data_image'];
        }

        $data = EventModel::where("id_event", $request['id_event'])
        ->update(["title_event" => $request['title_event'], "content_event" => $request['content_event'], "image_event" => $file]);

        Session::flash('note', 'Success update data event'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function delete(Request $request){
        $data = EventModel::where("id_event", $request['id'])->update(["delete_status" => "1"]);
        
        Session::flash('note', 'Success delete data event'); 
        return redirect()->back()->with(array('message' => '1'));
    }

    public function uploadImage($file, $removeFile){
        $gen = date("Y-m-d H-i-s");
        $gen = str_replace(" ", "", str_replace("-", "", $gen));

        $fileName = str_replace(" ", "-", $file->getClientOriginalName());

        if(!empty($removeFile)){
            $fileData = Config::get("constants.pathImage")."event/".$removeFile;
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
        $file->move(base_path('assets/images/event'),$gen."-".$fileName);

        return $gen."-".$fileName;
    }
}
