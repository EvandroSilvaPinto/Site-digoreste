<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Cities;

class CitiesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,  $countries_id, $states_id)
    {

        $cities = Cities::Where('states_id', $states_id)->get()->pluck("name", 'cities_id');

        return $cities;
    }
}
