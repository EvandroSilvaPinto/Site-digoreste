<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Product;

class SelectorController extends SiteController
{
    public function selector($parm)
    {
        $subcategory = Subcategory::where('category_id', $parm)->where('status', true)->get();
        return response()->json($subcategory);
    }
}
