<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\CmsController;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Log_erros;
use Excel;


class Log_errorsController extends CmsController
{
	public function index(Request $request){

		$log_erros = Log_erros::orderBy('log_erros_id', 'DESC');

		if ($request->input('date_entry')) {
            $log_erros->where('created_at', '>=', $request->input('date_entry'));
        }

        if ($request->input('date_output')) {
            $log_erros->where('created_at', '<=', $request->input('date_output'));
        }

		return view("cms/log-errors/index",array(
			"log_erros" => $log_erros->paginate(50)
		));
	}

	public function show($id){

		$log_erro = Log_erros::find($id);

        if(empty($log_erro)) {
            abort(404);
        }

		return view("cms/log-errors/show",array(
			'log_erro' => $log_erro
		));
	}
}