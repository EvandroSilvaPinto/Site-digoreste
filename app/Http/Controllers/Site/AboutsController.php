<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Slide;

use App\Model\Reference;

use App\Model\Abouts;

class AboutsController extends SiteController
{
    public function index()
    {
        \Config::set('app.appTitle', 'Quem Somos');

        $slide      = Slide::where('status', TRUE)->get();
        $abouts     = Abouts::where('status', TRUE)->first();
        $reference  = Reference::where('status', TRUE)->first();

        return view("site/abouts/index", array(

            "slide"     => $slide,
            "abouts"    => $abouts,
            "reference" => $reference,
        ));
    }
}
