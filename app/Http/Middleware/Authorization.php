<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {   
        if (Auth::user()->canDo($permission) || in_array($permission, Auth::user()->permissions->pluck('name')->toArray())) {

            return $next($request);
            
        }elseif (($permission == "cms-user-show" || $permission == "cms-user-update") && Auth::user()->users_id == $request->route('id')) {
            return $next($request);
        }

        $request->session()->flash('alert', array('code'=> 'error', 'text'  => "Você não tem permissão para executar a ação de <strong>".$request->route()->getAction()['nickname'].'</strong>'));
        
        return back(); 
    }
}