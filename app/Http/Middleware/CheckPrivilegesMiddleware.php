<?php

namespace App\Http\Middleware;
use App\models\config\PrivilegesModel;
use Auth;

use Closure;

class CheckPrivilegesMiddleware
{
    public function handle($request, Closure $next)
    {
        $module = $request->segment(1);

        $privileges = PrivilegesModel::select("*")
        ->where('privileges.delete_status', '0')
        ->where('privileges.id_user', @Auth::user()->id)
        ->join('menu', 'menu.id_menu', '=', 'privileges.id_menu');
        if(!empty($module)){
            $privileges->where('menu.name_modul', $module);
        } else if(!empty($module_sub)) {
            $privileges->join('sub_menu', 'sub_menu.id_menu', '=', 'menu.id_menu')->where('sub_menu.name_modul',$module_sub);
        }
        
        $data = $privileges->get();

        if((int)$data[0]['view_action'] != 1) {
            return redirect('/');
        }

        return $next($request);
    }
}