<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Http\Response;

use App\Model\Seo\Sitemap as Sitemap;


class SitemapController extends Controller
{
    public function index() 
    {
        return response()->view("seo/sitemap/index", array(
       		"itens" => Sitemap::get()
        ))->header('Content-Type', "application/xml");
    }
}
