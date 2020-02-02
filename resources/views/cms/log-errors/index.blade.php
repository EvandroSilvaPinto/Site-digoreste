@extends('layouts._app')

@section('content')	
@include('cms.includes.header')
<section class="wrapper">
	@include('cms.includes.sidebar')
	<div class="content">
		<div class="container-fluid">
			<div class="row">	
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="breadcrumb">
						<li>
							<a href="{!!route('cms-home')!!}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
						</li>
						<li>
							<a href="{!!route('cms-log-errors')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Log de Erros</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default search-invoice">
						{!! Form::open(['method' => 'get', 'autocomplete' => 'on', 'route' => ['cms-log-errors']]) !!} 
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('date_entry', 'Data Inicial')!!}
			            			   {!!Form::date('date_entry') !!}	
			            			   <label class="error">{!!$errors->first('date_entry')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('date_output', 'Data Final')!!}
			            			   {!!Form::date('date_output') !!}	
			            			   <label class="error">{!!$errors->first('date_output')!!}</label>                      
					                </div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<button class="btn-search pull-right btn-primary">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>	           	            
						{!! Form::close() !!}
					</div>
				</div>
			</div>
			@include('layouts._alerts')	
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default list">
						<table>
							<thead>
								<tr>
									<th>Código</th>									
									<th>Local</th>
									<th>Linha</th>
									<th>Data</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($log_erros as $value)
									<tr>
										<td data-label="Código">
											{!! $value->code !!}
										</td>										
										<td data-label="Local">
											{!! $value->file !!}
										</td>
										<td data-label="Linha">
											{!! $value->line !!}
										</td>
										<td data-label="Data">
											{!! $value->created_at !!}
										</td>
										<td data-label="Ações">
											<a href="{!!route('cms-log-errors-show', $value->log_erros_id)!!}" title="Visualizar"  class="btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					{!!$log_erros->appends(Request::input())->render()!!}
				</div>
			</div>
		</div>
	</div>	
</section>
@include('cms.includes.footer')
@endsection