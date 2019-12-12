<?php

namespace App\Http\Controllers\config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\config\ConfigModel;

class ConfigController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(){
        return view("config/config");
    }
}