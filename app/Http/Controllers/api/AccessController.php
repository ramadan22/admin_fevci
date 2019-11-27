<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    public function access($header){
        echo "<pre>";
            print_r();
        echo "</pre>";
    }
}
