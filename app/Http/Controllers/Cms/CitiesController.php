<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\States;
use App\Model\Countries;
use App\Model\Cities;
use Validator;

class CitiesController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = Cities::orderBy("cities_id", "DESC");

        if($request->input('name'))
        {
           $cities->where('name', 'like', '%'.$request->input('name').'%');
        }

        if($request->input('status'))
        {
           $cities->where('status',$request->input('status'));
        }

        if($request->input('countries_id'))
        {
            $cities->whereHas('state', function ($query) use ($request)
            {
                $query->whereHas('countrie', function ($query) use ($request)
                {
                    $query->where('countries_id',$request->input('countries_id'));
                });
            });
        }

        if($request->input('states_id'))
        {
            $cities->whereHas('state', function ($query) use ($request)
            {
               $query->where('states_id',$request->input('states_id'));
            });           
        }

        return view("cms/cities/index", array(
            "cities"    => $cities->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/cities/show");
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
            'countries_id' => 'required',
            'states_id'    => 'required',
            'status'       => 'required'
        ]);

        $niceNames = array(
            'name'         => 'nome',
            'countries_id' => 'pais',
            'states_id'    => 'estado',
            'status'       => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-citie-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $citie = Cities::create($request->all());
            return redirect(route('cms-citie-show', $citie->cities_id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-cities')); 
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
        $citie = Cities::find($id);
        
        if(empty($citie)) {
            abort(404);
        }

        return view("cms/cities/show", array(
            "citie" => $citie
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
            'countries_id' => 'required',
            'states_id'    => 'required',
            'status'       => 'required'
        ]);

        $niceNames = array(
            'name'         => 'nome',
            'countries_id' => 'pais',
            'states_id'    => 'estado',
            'status'       => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-citie-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {
           
            Cities::find($id)->update($request->all());
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-cities'));
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
            $citie = Cities::find($id);

            if ($citie->accrediteds->count()) {
                $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Você não pode exluir a cidade ('.$citie->name.'), pois a mesma está veinculado a '.$citie->accrediteds->count().' credenciado(s)!'));
                return redirect(route('cms-cities'));
            }

            if ($citie->students->count()) {
                $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Você não pode exluir a cidade ('.$citie->name.'), pois a mesma está veinculado a '.$citie->students->count().' estudante(s)!'));
                return redirect(route('cms-cities'));
            }

            if(empty($citie)) {
                abort(404);
            }

            $citie->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-cities'));
    }
}
