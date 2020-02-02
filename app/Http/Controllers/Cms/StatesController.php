<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\States;
use App\Model\Countries;
use Validator;

class StatesController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = States::orderBy("states_id", "DESC");

        if($request->input('name'))
        {
           $states->where('name', 'like', '%'.$request->input('name').'%');
        }

        if($request->input('status'))
        {
           $states->where('status',$request->input('status'));
        }

        if($request->input('countries_id'))
        {
           $states->where('countries_id',$request->input('countries_id'));
        }

        return view("cms/states/index", array(
            "states"    => $states->paginate(50),
            "countries" => Countries::all()->pluck('name', 'countries_id')
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/states/show", array(
            "countries" => Countries::all()->pluck('name', 'countries_id')
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'name'         => 'required',
            'initials'     => 'required',
            'countries_id' => 'required',
            'status'       => 'required'
        ]);

        $niceNames = array(
            'name'         => 'nome',
            'initials'     => 'sigla',
            'countries_id' => 'pais',
            'status'       => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-state-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $state = States::create($request->all());
            return redirect(route('cms-state-show', $state->states_id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-states')); 
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state =  States::find($id);
        
        if(empty($state)) {
            abort(404);
        }

        return view("cms/states/show", array(
            "state"     => $state,
            "countries" => Countries::all()->pluck('name', 'countries_id')
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->input(), [
            'name'         => 'required',
            'initials'     => 'required',
            'countries_id' => 'required',
            'status'       => 'required'
        ]);

        $niceNames = array(
            'name'         => 'nome',
            'initials'     => 'sigla',
            'countries_id' => 'pais',
            'status'       => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-state-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {           
            States::find($id)->update($request->all());
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-states'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $states = States::find($id);

            if ($states->cities->count()) {
                $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Você não pode exluir o estado ('.$states->name.'), pois o mesmo está veinculado a '.$states->cities->count().' cidade(s)!'));
                return redirect(route('cms-states'));
            }

            if(empty($states)) {
                abort(404);
            }

            $states->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-states'));
    }
}
