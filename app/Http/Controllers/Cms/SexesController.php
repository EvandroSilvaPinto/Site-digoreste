<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Sexes;
use Validator;

class SexesController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sexes = Sexes::orderBy("sexes_id", "DESC");

        if($request->input('name'))
        {
           $sexes->where('name', 'like', '%'.$request->input('name').'%');
        }

        if($request->input('status'))
        {
           $sexes->where('status', $request->input('status'));
        }

        return view("cms/sexes/index", array(
            "sexes" => $sexes->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/sexes/show");
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
            'name'   => 'required',            
            'status' => 'required'


        ]);

        $niceNames = array(
            'name'   => 'nome',         
            'status' => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-sexe-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $sexe = Sexes::create($request->all());
            return redirect(route('cms-sexe-show', $sexe->sexes_id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-sexes')); 
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
        $sexe = Sexes::find($id);

        if (empty($sexe)) {
            abort(404);
        }

        return view("cms/sexes/show", array(
            "sexe" => $sexe
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
            'name'   => 'required',         
            'status' => 'required'

        ]);

        $niceNames = array(
            'name'   => 'nome',       
            'status' => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-sexe-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {
           
            Sexes::find($id)->update($request->all());
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-sexes'));
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
            $sexe = Sexes::find($id);

            if ($sexe->users->count()) {
                $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Você não pode exluir o sexo ('.$sexe->name.'), pois a mesma está veinculado a '.$sexe->users->count().' usuario(s)!'));
                return redirect(route('cms-sexes'));
            }

            if(empty($sexe)) {
                abort(404);
            }

            $sexe->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-sexes'));
    }
}
