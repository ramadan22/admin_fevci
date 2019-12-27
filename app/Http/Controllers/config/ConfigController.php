<?php

namespace App\Http\Controllers\config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\config\UserModel;
use App\models\config\PrivilegesModel;
use App\models\config\IconModel;
use App\models\M_menu as menu_model;
use Config;
use Session;
use Auth;

class ConfigController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
        if(Auth::user()->status != "0"){
            return redirect("/");
        }
    }

    public function index(){
        
        $data['menu'] = menu_model::select("*")
        // ->join('sub_menu', 'menu.id_menu', '=', 'sub_menu.id_menu')
        ->where('menu.delete_status', '0')
        ->get();

        $data['users'] = UserModel::select("*")
        ->orderBy('status', 'asc')
        ->where('delete_status', '0')
        ->get();

        $data['privileges'] = PrivilegesModel::select("*")
        ->where('privileges.delete_status', '0')
        ->where('privileges.id_user', Auth::user()->id)
        ->join('menu', 'menu.id_menu', '=', 'privileges.id_menu')
        // ->join('sub_menu', 'sub_menu.id_menu', '=', 'menu.id_menu')
        ->get();

        $data['icons'] = IconModel::select("*")->get();

        // echo "<pre>";
        //     print_r($data['icons']);die();

        return view("config/config", $data);
    }

    public function updateMenu(Request $request){
        // echo $request['id_menu']."<br />";
        // echo $request['name']."<br />";
        // echo $request['icon']."<br />";

        $data = menu_model::where("id_menu", $request['id_menu'])->update(["name_menu" => $request['name'], "icon" => $request['icon']]);

        // if($data){
        //     echo "success";
        // }

        Session::flash('note', 'Success update data menu'); 
        return redirect()->back()->with(array('message' => '1'));
    }
}