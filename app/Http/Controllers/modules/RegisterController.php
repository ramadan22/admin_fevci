<?php

namespace App\Http\Controllers\modules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\modules\RegisterModel;
use Config;
use Session;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $limit = 15;
        $offset = 0;

        $data['totalData'] = RegisterModel::where("delete_status", "0")->count();

        if(!empty($_GET['page'])){
            $page = $_GET['page'];
            $offset = ($page*$limit)-$limit;
        }

        $data['data'] = RegisterModel::select('*')
        ->orderBy('id_register', 'desc')
        ->limit($limit)
        ->offset($offset)
        ->where("delete_status", "0")
        ->get();

        $data['limit'] = $limit;

        return view("modules/register", $data);
    }
}
