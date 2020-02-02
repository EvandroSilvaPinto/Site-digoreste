<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Slide;

use App\Model\Reference;

use App\Model\Adress;

class AdressController extends SiteController
{
    public function index()
    {
        \Config::set('app.appTitle', 'Lojas');

        $slide      = Slide::where('status', TRUE)->get();
        $reference  = Reference::where('status', TRUE)->first();
        $adress     = Adress::where('status', TRUE)->orderBy('adress_id', 'desc')->get();

        return view("site/adress/index", array(

            "slide"     => $slide,
            "reference" => $reference,
            "adress"    => $adress,
        ));
    }
}
