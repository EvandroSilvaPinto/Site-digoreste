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
							<a href="{!!route('cms-roles')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Grupos de Usuários</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($role)) ? 'Novo' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($role))
			                {!! Form::model($role, ['route' => ['cms-role-update', $role->id], 'method' => 'put']) !!}
			            @else
			                {!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-role-create']]) !!}
			            @endif        		    
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('name', 'Nome ')!!}
			            			   {!!Form::text('name') !!}	
			            			   <label class="error">{!!$errors->first('name')!!}</label>                      
					                </div>
								</div>								
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row"> 
										<h4 class="panel-title-primary">Permissões de Acesso</h4> 	
			            			    <div class="panel-secondary">
			            			  		<div class="row">				            			 	
					            			 	@foreach ($permissions as $key => $value)
					            			 		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					            			 			<div class="form-row">
					            			 				{!!Form::checkbox('permissions[]', $key, isset($role) ? in_array($key, $role->permissions->pluck("id")->toArray()) : false, [ "id" => "permissions-".$key])!!}
					            			 				{!!Form::label("permissions-".$key, $value)!!}
					            			 			</div>
					            			 		</div>
					            			 	@endforeach			            			 		
			            			 		</div>
			            			  	</div>
			            			   	<label class="error">{!!$errors->first('permission_id')!!}</label>                   
					                </div>
								</div>								
							</div>							
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">										
										<button class="pull-right btn-primary">Salvar <i class="fa fa-check-square" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>	           	            
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
@include('cms.includes.footer')
@endsection