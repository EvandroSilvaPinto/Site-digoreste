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
							<a href="{!!route('cms-states')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Estados</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						{!! Form::open(['method' => 'get', 'autocomplete' => 'on', 'route' => ['cms-states']]) !!}           		    
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('name', 'Nome')!!}
			            			   {!!Form::text('name') !!}	
			            			   <label class="error">{!!$errors->first('name')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('countries_id', 'Paises')!!}
			            			   {!!Form::select('countries_id', $countries, null, ['placeholder' => "Selecione"]) !!}	
			            			   <label class="error">{!!$errors->first('countries_id')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('status', 'Status')!!}
			            			   {!!Form::select('status', ['1' => 'Ativo', '2' => "Inativo"], null, ['placeholder' => "Selecione"]) !!}	
			            			   <label class="error">{!!$errors->first('status')!!}</label>                      
					                </div>
								</div>								
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										@shield('cms-state-create')
										  <a href="{!!route('cms-state-create')!!}" class="pull-right btn-quartenary">Novo <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
										@endshield	
										<button class="pull-right btn-primary">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
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
									<th>Nome</th>
									<th>Estado</th>
									<th>Status</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($states as $value)
									<tr>
										<td data-label="Nome">{!!$value->name!!}</td>			
										<td data-label="Sigla">{!!$value->countrie->name!!}</td>								
										<td data-label="Status">{!!$value->status()!!}</td>
										<td data-label="Ações">
											@shield('cms-state-delete')
											  <a href="{!!route('cms-state-delete', $value->states_id)!!}" title="Excluir" class="btn-primary"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
											@endshield	
											@shield('cms-state-show')
											 	<a href="{!!route('cms-state-show', $value->states_id)!!}" title="Visualizar" class="btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											@endshield	
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
					{!!$states->appends(Request::input())->render()!!}
				</div>
			</div>
		</div>
	</div>	
</section>
@include('cms.includes.footer')
@endsection