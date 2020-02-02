<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use View;

class SiteController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();   

      //   View::share(array(
     	// ));    
    }  
}
