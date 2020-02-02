<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   use AuthenticatesUsers;

   public function index()
   {	
   		return view("cms/auth/index");
   }
   
    public function logout(Request $request) {
    	
        Auth::logout();
    	
        $request->session()->flash('alert', array('code'=> 'success', 'text'  => 'Você foi desconectado'));
    	return redirect(route('cms-auth'));
    }

    public function authenticate(Request $request) {

   		if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'status' => TRUE], $request->input('remember'))) {

            return redirect()->intended(route('cms-home'));
        }

        $request->session()->flash('alert', array('code'=> 'error', 'text'  => 'Acesso não autorizado'));

        return back();
    }

    protected function guard()
    {
        return Auth::guard('cms');
    }
}
