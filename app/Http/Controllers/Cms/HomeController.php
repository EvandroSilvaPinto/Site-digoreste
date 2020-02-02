<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use Route;

use App\Model\Permissions;

use DB;

class HomeController extends CmsController
{
    public function index()
    {	
    	$routes = Route::getRoutes();

        foreach($routes as $route)
        {  
            if(substr($route->getName(), 0, 3) == "cms"
            	&& $route->getName() != 'cms-auth'
            	&& $route->getName() != 'cms-home'
            	&& $route->getName() != 'cms-auth-logout'
            ){
                $permission = Permissions::where('name', $route->getName())->get();

                if(count($permission) == 0)
                {
					$permissionId = Permissions::create(array(
                        'readable_name' => $route->getAction()['nickname'],
                        'name'          => $route->getName(),
                    ))->id;

                    DB::table('permission_role')->insert(array(
                        'permission_id' => $permissionId,
                        'role_id'       => 1,
                        'value'         => -1,
                        'expires'       => null,
                    ));
                }
            }
        }
        
   		return view("cms/home/index");
    }
}

