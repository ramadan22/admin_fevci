<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\M_menu as menu;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;

class C_dashboard extends Controller {
	public function __construct(){
		
	}

	public function index(){
		// Auth::logout();

		// $user = Auth::user();
		// $id = Auth::id();

		// echo $id."<br />";
		// echo $user;
		// die();

		return view("home");
	}
}