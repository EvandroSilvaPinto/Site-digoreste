<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\States;

class StatesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $countries_id)
    {

        $states =  States::Where('countries_id', $countries_id)->get()->pluck("name", 'states_id');
        return $states;
    }
}
