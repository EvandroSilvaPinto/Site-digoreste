<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use View;

class CmsController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();

        if($request->route()->getName() != "cms-home") {
        	$this->middleware('authorization:'.$request->route()->getName());
        }       

        // View::share(array(
        // )); 
    }  
}

