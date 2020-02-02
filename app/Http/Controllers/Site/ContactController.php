<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\SiteController;

use Illuminate\Http\Request;

use App\Model\Slide;

use App\Model\Contact;
use App\Model\Reference;

use App\Http\Requests;
use Validator;
use Mail;

class ContactController extends SiteController
{
   public function index()
   {
      \Config::set('app.appTitle', 'Contato');

      $slide = Slide::where('status', TRUE)->get();
      $reference  = Reference::where('status', TRUE)->first();

      return view("site/contact/index", array(

         "slide"     => $slide,
         "reference" => $reference,
      ));
   }
   
   public function store(Request $request)
   {
      $request->merge(array(
         'status' =>  '2'
      ));

      $data = (object)$request->input();

      try {
         // Mail::send('contact/email', ['data' => $data], function ($email) use ($data) {
         //     $email->from($data->email, 'Contato');
         //     $email->to("evandrosilvapinto@outlook.com", $data->name)->subject('Pedido de Contato');
         // });
         Contact::create($request->all());
         return response()->json([
            'message' => "Mensagem enviada com sucesso!",
         ]);
      } catch (\Swift_TransportException $e) {
         return response()->json(array('code' => 'error', 'text'  => $e));
      }
   }
}
