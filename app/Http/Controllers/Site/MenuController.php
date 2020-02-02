<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Slide;
use App\Model\Reference;

use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Product;

class MenuController extends SiteController
{
    public function index()
    {
        \Config::set('app.appTitle', 'Cardápio');

        $category       = Category::where('status', TRUE)->get();
        $subcategorys   = Category::find(1)->subcategorys;
        $products       = Subcategory::find(1)->products;
        $slide          = Slide::where('status', TRUE)->get();
        $reference      = Reference::where('status', TRUE)->first();

        return view("site/menu/index", array(

            "slide"       => $slide,
            "reference"   => $reference,
            "category"    => $category,
            "subcategorys" => $subcategorys,
            "products"     => $products,
        ));
    }
}
