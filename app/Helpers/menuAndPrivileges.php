<?php
    use App\models\M_menu as menu_model;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;

	if (!function_exists('menuAndPrivileges')) {
		function menuAndPrivileges(){
            $menu = menu_model::select("*")
            ->where('menu.delete_status', '0')
            ->get();
            
            if(count($menu)>0){
                $n = 0;
                foreach($menu as $dataMenu){
                    $subMenu = json_decode(DB::table('sub_menu')
                    ->select('*')
                    ->where('delete_status', '0')
                    ->where('id_menu', $dataMenu['id_menu'])
                    ->get(), true);
                    
                    if(count($subMenu)>0){
                        $m = 0;
                            $menu[$n]['sub_menu'] = $subMenu;
                            $m++;
                    } else {
                        $menu[$n]['sub_menu'] = "";
                    }

                    $n++;
                }
            }
            return $menu;
        }
    }
    
    if (!function_exists('getUser')) {
        function getUser(){
            $user = Auth::user();
            return json_decode($user, true);
        }
    }