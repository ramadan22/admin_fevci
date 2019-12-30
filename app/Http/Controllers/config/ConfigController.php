<?php

namespace App\Http\Controllers\config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\config\UserModel;
use App\models\config\PrivilegesModel;
use App\models\config\IconModel;
use App\models\M_menu as menu_model;
use Illuminate\Support\Facades\DB;
use Config;
use Session;
use Auth;

class ConfigController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        if(@Auth::user()->status != "0"){
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
        ->where('privileges.id_user', @Auth::user()->id)
        ->join('menu', 'menu.id_menu', '=', 'privileges.id_menu')
        ->get();

        if($data['privileges']){
            foreach($data['privileges'] as $row){
                $subMenu = json_decode(DB::table('sub_menu')->where('id_sub_menu', $row['id_sub_menu'])->get(), true);
                
                $i = 0;
                // $i2 = 0;
                if(!empty($subMenu)){
                    
                    // foreach($subMenu as $row2){
                        $data['sub_menu'][$row['id_sub_menu']][$i] = $subMenu[0]['name_sub_menu'];

                        $i++;
                    // }
                }

                // $i++;
            }
        }

        // echo "<pre>";
        //     print_r($data['sub_menu']);

        // die();

        $data['icons'] = IconModel::select("*")->get();

        
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