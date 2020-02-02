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
							<a href="{!!route('cms-users')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Usuários</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						{!! Form::open(['method' => 'get', 'autocomplete' => 'on', 'route' => ['cms-users']]) !!}           		    
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('first_name', 'Nome')!!}
			            			   {!!Form::text('first_name') !!}	
			            			   <label class="error">{!!$errors->first('first_name')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('email', 'E-mail')!!}
			            			   {!!Form::text('email') !!}	
			            			   	<label class="error">{!!$errors->first('email')!!}</label>     
				                    </div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('status', 'Status')!!}
			            			   {!!Form::select('status', ['1' => 'Ativo', '2' => 'Inativo'], false, ['placeholder' => "Selecione"]) !!}	
			            			   <label class="error">{!!$errors->first('status')!!}</label>                      
					                </div>
								</div>								
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<a href="{!!route('cms-user-create')!!}" class="pull-right btn-quartenary">Novo <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
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
									<th>E-mail</th>
									<th>Status</th>
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $value)
									<tr>
										<td data-label="Nome">{!!$value->first_name." ".$value->last_name!!}</td>
										<td data-label="E-mail">{!!$value->email!!}</td>										
										<td data-label="Status">{!!$value->status()!!}</td>
										<td data-label="Ações">
											<a href="{!!route('cms-user-delete', $value->users_id)!!}" title="Excluir" class="btn-primary"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
											<a href="{!!route('cms-user-show', $value->users_id)!!}" title="Visualizar" class="btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
					{!!$users->appends(Request::input())->render()!!}
				</div>
			</div>
		</div>
	</div>	
</section>
@include('cms.includes.footer')
@endsection