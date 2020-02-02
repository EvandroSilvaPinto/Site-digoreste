<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Slide;

use App\Model\Summary;

use App\Model\Reference;

use App\Model\Social;

use App\Model\Media;

use App\Model\Contact;

class HomeController extends SiteController
{
   public function index()
   {
      $slide      = Slide::where('status', TRUE)->get();
      $social     = Social::where('status', TRUE)->take(3)->get();
      $summary    = Summary::where('status', TRUE)->take(4)->get();
      $reference  = Reference::where('status', TRUE)->first();
      $media      = Media::where('status', TRUE)->first();

      return view("site/home/index", array(

         "slide"     => $slide,
         "social"    => $social,
         "summary"   => $summary,
         "reference" => $reference,
         "media"     => $media,
      ));
   }
}
