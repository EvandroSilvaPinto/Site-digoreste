<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Users;
use App\Model\Roles;
use App\Model\Permissions;
use App\Model\Sexes;
use Validator;


class UsersController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = Users::orderBy("users_id", "DESC");

        if($request->input('first_name'))
        {
           $users->where('first_name', 'like', '%'.$request->input('first_name').'%');
        }

        if($request->input('email'))
        {
           $users->where('email', 'like', '%'.$request->input('email').'%');
        }

        if($request->input('status'))
        {
           $users->where('status', $request->input('status'));
        }

        return view("cms/users/index", array(
            "users" => $users->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/users/show", array(
            "roles"       => Roles::all()->pluck('name', 'id'),
            "permissions" => Permissions::all()->pluck('readable_name', 'id'),
            "sexes"       => Sexes::where('status', TRUE)->get()->pluck('name', 'sexes_id')
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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required',
            'password'     => 'required',
            'address'      => 'required',
            'cep'          => 'required',            
            'neighoarhood' => 'required', 
            'phone'        => 'required',            
            'cellphone'    => 'required',
            'countries_id' => 'required',
            'states_id'    => 'required',
            'cities_id'    => 'required',
            'sexes_id'     => 'required',
            'status'       => 'required'
        ]);

        $niceNames = array(
            'first_name'   => 'nome',
            'last_name'    => 'sobrenome',
            'email'        => 'email',
            'password'     => 'senha',
            'address'      => 'endereço',
            'cep'          => 'cep',            
            'neighoarhood' => 'bairro', 
            'phone'        => 'telefone',            
            'cellphone'    => 'celular',
            'countries_id' => 'pais',
            'states_id'    => 'estado',
            'cities_id'    => 'cidade',
            'sexes_id'     => 'sexo',
            'status'       => 'status'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-user-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $user = Users::create($request->all());
            $user->roles()->sync(($request->input('roles') == null) ? [] : $request->input('roles'));  
            $user->permissions()->sync(($request->input('permissions') == null) ? [] : $request->input('permissions'));        
            return redirect(route('cms-user-show', $user->users_id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-users')); 
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
        $user =  Users::find($id);
        
        if(empty($user)) {
            abort(404);
        }

        return view("cms/users/show", array(
            "user"        => $user,
            "roles"       => Roles::all()->pluck('name', 'id'),
            "permissions" => Permissions::all()->pluck('readable_name', 'id'),
            "sexes"       => Sexes::where('status', TRUE)->get()->pluck('name', 'sexes_id')
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
            'first_name'   => 'required',
            'last_name'    => 'required',
            'email'        => 'required',
            'address'      => 'required',
            'cep'          => 'required',            
            'neighoarhood' => 'required', 
            'phone'        => 'required',            
            'cellphone'    => 'required',
            'countries_id' => 'required',
            'states_id'    => 'required',
            'cities_id'    => 'required',
            'sexes_id'     => 'required'
        ]);

        $niceNames = array(
            'first_name'   => 'nome',
            'last_name'    => 'sobrenome',
            'email'        => 'email',
            'address'      => 'endereço',
            'cep'          => 'cep',            
            'neighoarhood' => 'bairro', 
            'phone'        => 'telefone',            
            'cellphone'    => 'celular',
            'countries_id' => 'pais',
            'states_id'    => 'estado',
            'cities_id'    => 'cidade',
            'sexes_id'     => 'sexo'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-user-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {
           
            $user = Users::find($id);
            $user->update((!empty($request->input('password'))) ? $request->except(["image"]) : $request->except(["password", "image"]));
            $user->roles()->sync(($request->input('roles') == null) ? [] : $request->input('roles'));
            $user->permissions()->sync(($request->input('permissions') == null) ? [] : $request->input('permissions'));
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-users'));
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
            $user = Users::find($id);

            if(empty($user)) {
                abort(404);
            }

            $user->roles()->sync([]);
            $user->permissions()->sync([]);
            $user->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-users'));
    }
}
