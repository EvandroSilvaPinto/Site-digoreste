<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Http\Response;

use App\Model\Seo\Feed as Feed;

class FeedController extends Controller
{
    public function index() 
    {
    	return response()->view("seo/feed/index", array(
       		"itens" => Feed::get()
        ))->header('Content-Type', "application/xml");
    }
}
