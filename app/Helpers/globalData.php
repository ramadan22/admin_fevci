<?php
    use Illuminate\Support\Facades\Auth;

	if (!function_exists('globalData')) {
		function globalData(){
            $globalData = array(
                "title" => "Admin FEvCI"
            );

            return $globalData;
        }
    }