<?php

namespace App\Http\Controllers\api\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\api\AccessController;

class AboutController extends Controller
{
    public function __construct(Request $request){
        echo "<pre>";
            print_r($request->header());
        echo "</pre>";

        die();

        $AccessController = new AccessController;
        return $AccessController->access();
	}

    public function index(){
        echo "About us Controller";
    }
}
