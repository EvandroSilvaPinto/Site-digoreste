<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Countries;
use Validator;

class CountriesController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $countries = Countries::orderBy("countries_id", "DESC");

        if($request->input('name'))
        {
           $countries->where('name', 'like', '%'.$request->input('name').'%');
        }

        if($request->input('status'))
        {
           $countries->where('status',$request->input('status'));
        }

        return view("cms/countries/index", array(
            "countries" => $countries->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/countries/show");
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
            'name'     => 'required',
            'initials' => 'required',
            'status'   => 'required'
        ]);

        $niceNames = array(
            'name'     => 'nome',
            'initials' => 'sigla',
            'status'   => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-countrie-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $countrie = Countries::create($request->all());
            return redirect(route('cms-countrie-show', $countrie->countries_id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-countries')); 
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
        $countrie =  Countries::find($id);
        
        if(empty($countrie)) {
            abort(404);
        }

        return view("cms/countries/show", array(
            "countrie" => $countrie
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
            'name'     => 'required',
            'initials' => 'required',
            'status'   => 'required'
        ]);

        $niceNames = array(
            'name'     => 'nome',
            'initials' => 'sigla',
            'status'   => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-countrie-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {           
            Countries::find($id)->update($request->all());
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-countries'));
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
            $countrie = Countries::find($id);

            if ($countrie->states->count()) {
                $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Você não pode exluir o pais ('.$countrie->name.'), pois o mesmo está veinculado a '.$countrie->states->count().' estado(s)!'));
                return redirect(route('cms-countries'));
            }

            if(empty($countrie)) {
                abort(404);
            }

            $countrie->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-countries'));
    }
}
