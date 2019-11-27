<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\M_menu as menu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class C_dashboard extends Controller {
	public function __construct(){
		
	}

	public function index(){
		return view("V_dashboard");
	}
}