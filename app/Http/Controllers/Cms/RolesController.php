<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Roles;
use App\Model\Permissions;
use Validator;

class RolesController extends CmsController
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Roles::orderBy("id", "DESC");

        if($request->input('name'))
        {
           $roles->where('name', 'like', '%'.$request->input('name').'%');
        }

        return view("cms/roles/index", array(
            "roles" => $roles->paginate(50)
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cms/roles/show", array(
            "permissions" => Permissions::all()->pluck('readable_name', 'id')
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
            'name' => 'required'
        ]);

        $niceNames = array(
            'name' => 'nome'
        );

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-role-create'))->withErrors($validator->messages())->withInput();        
        } 

        try {
            $role = Roles::create($request->all());
            $role->permissions()->sync(($request->input('permissions') == null) ? [] : $request->input('permissions')); 
            return redirect(route('cms-role-show', $role->id)); 
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
            return redirect(route('cms-roles')); 
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
        $role = Roles::find($id);

        if(empty($role)) {
            abort(404);
        }

        return view("cms/roles/show", array(
            "role"        => $role,
            "permissions" => Permissions::all()->pluck('readable_name', 'id')
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
            'name' => 'required'
        ]);

        $niceNames = array(
            'name' => 'nome'
        );

        $validator->setAttributeNames($niceNames); 

        $validator->setAttributeNames($niceNames); 

        if($validator->fails()) {
            return redirect(route('cms-role-show', $id))->withErrors($validator->messages())->withInput();        
        } 

        try {
           
            $role = Roles::find($id);
            $role->update($request->all());
            $role->permissions()->sync(($request->input('permissions') == null) ? [] : $request->input('permissions'));
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-roles'));
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
            $role = Roles::find($id);

            if(empty($role)) {
                abort(404);
            }

            $role->users()->sync([]);
            $role->permissions()->sync([]);
            $role->delete();
            $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Operação realizada com sucesso!'));
        } catch (Exception $e) {
            $request->session()->flash('alert', array('code'=> 'error', 'text'  => $e));
        }
       
        return redirect(route('cms-roles'));
    }
}
