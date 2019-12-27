<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\config\PrivilegesModel;
use Illuminate\Support\Facades\DB;
use App\models\M_menu;
use Config;
use Session;
use Auth;

class CreatePrivilegesController extends Controller
{
    public function createUserPrivileges($id_user){
        $date = date("Y-m-d H:i:s");

        $menu = M_menu::select("*")->where("delete_status", "0")->get();

        if(count($menu)>0){
            foreach($menu as $row){
                $subMenu = 0;

                $subMenu = json_decode(DB::table('sub_menu')
                ->select('*')
                ->where('delete_status', '0')
                ->where('id_menu', $row['id_menu'])
                ->get(), true);

                if(count($subMenu)>0){
                    foreach($subMenu as $row2){
                       $data = array(
                            "view_action" => "1", 
                            "create_action" => "0", 
                            "edit_action" => "0",
                            "delete_action" => "0",
                            "delete_status" => "0",
                            "created_date" => $date,
                            "id_menu" => $row['id_menu'],
                            "id_sub_menu" => $row2['id_sub_menu'],
                            "id_user" => $id_user
                       );

                       $this->add($data);
                    }
                } else {

                    $data = array(
                        "view_action" => "1", 
                        "create_action" => "0", 
                        "edit_action" => "0",
                        "delete_action" => "0",
                        "delete_status" => "0",
                        "created_date" => $date,
                        "id_menu" => $row['id_menu'],
                        "id_sub_menu" => "0",
                        "id_user" => $id_user
                    );

                    $this->add($data);
                }
            }
        }
    }

    public function add($data){
        echo "<pre>";
            print_r($data);

        $add = PrivilegesModel::insert([
                                        "view_action" => $data['view_action'], 
                                        "create_action" => $data['create_action'], 
                                        "edit_action" => $data['edit_action'],
                                        "delete_action" => $data['delete_action'],
                                        "delete_status" => "0",
                                        "created_date" => $data['created_date'],
                                        "id_menu" => $data['id_menu'],
                                        "id_sub_menu" => $data['id_sub_menu'],
                                        "id_user" => $data['id_user']
                                    ]);
        return $add;
    }
}
