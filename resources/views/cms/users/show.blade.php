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
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($user)) ? 'Novo' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($user))
			                {!! Form::model($user, ['route' => ['cms-user-update', $user->users_id], 'method' => 'put']) !!}
			            @else
			                {!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-user-create']]) !!}
			            @endif        		    
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('first_name', 'Nome ')!!}
			            			   {!!Form::text('first_name') !!}	
			            			   <label class="error">{!!$errors->first('first_name')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('last_name', 'Sobrenome ')!!}
			            			   {!!Form::text('last_name') !!}	
			            			   <label class="error">{!!$errors->first('last_name')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('email', 'E-mail ')!!}
			            			   {!!Form::text('email') !!}	
			            			   	<label class="error">{!!$errors->first('email')!!}</label>     
				                    </div>
								</div>								
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('password', 'Senha ')!!}
			            			   {!!Form::password('password') !!}	
			            			   <label class="error">{!!$errors->first('password')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('address', 'Endereço')!!}
			            			   {!!Form::text('address') !!}	
			            			   <label class="error">{!!$errors->first('	address')!!}</label>                      
					                </div>
								</div>																
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('neighoarhood', 'Bairro')!!}
			            			   {!!Form::text('neighoarhood') !!}	
			            			   	<label class="error">{!!$errors->first('neighoarhood')!!}</label>     
				                    </div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('countries_id', 'Pais')!!}
			            			   {!!Form::select('countries_id', [], null, ['placeholder' => "Selecione", 'disabled'=> true, 'data-active' => (isset($user)) ? $user->countries_id : ""]) !!}	
			            			   	<label class="error">{!!$errors->first('countries_id')!!}</label>     
				                    </div>
								</div>	
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('states_id', 'Estado')!!}
			            			   {!!Form::select('states_id', [], null, ['placeholder' => "Selecione", 'disabled'=> true, 'data-active' => (isset($user)) ? $user->states_id : ""]) !!}	
			            			   	<label class="error">{!!$errors->first('states_id')!!}</label>     
				                    </div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('cities_id', 'Cidade')!!}
			            			   {!!Form::select('cities_id', [], null, ['placeholder' => "Selecione", 'disabled'=> true, 'data-active' => (isset($user)) ? $user->cities_id : ""]) !!}	
			            			   	<label class="error">{!!$errors->first('cities_id')!!}</label>     
				                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('cep', 'CEP ')!!}
			            			   {!!Form::text('cep') !!}	
			            			   <label class="error">{!!$errors->first('cep')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('phone', 'Telefone')!!}
			            			   {!!Form::text('phone') !!}	
			            			   <label class="error">{!!$errors->first('phone')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('cellphone', 'Celular')!!}
			            			   {!!Form::text('cellphone') !!}	
			            			   <label class="error">{!!$errors->first('cellphone')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('sexes_id', 'Sexo')!!}
			            			   {!!Form::select('sexes_id', $sexes, null, ['placeholder' => "Selecione"]) !!}	
			            			   <label class="error">{!!$errors->first('sexes_id')!!}</label>                      
					                </div>
								</div>															
							</div>
							<div class="row box-image">
								<div class="col-lg-12">
									<div class="form-row"> 
										<label for="">Foto de Perfil (120x120px)</label>
										<input type="file" class="FlexUpload" data-url="{{route('flexUpload')}}" data-entity="users" data-entity-id="{!!(isset($user)) ? $user->users_id : ''!!}" name="image">											   		                    
					                </div>
								</div>
							</div>	
							@shield('cms-user-show')							
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
										<div class="form-row">
											<h4 class="panel-title-primary">Grupos de Usuário</h4> 					                       
					                       <div class="panel-secondary">
					                       		<p class="info">Selecione um ou mais grupo de permissão para atribuir ao usuário.</p>
					                       		<div class="row">				            			 	
						            			 	@foreach ($roles as $key => $value)
						            			 		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						            			 			<div class="form-row">
						            			 				{!!Form::checkbox('roles[]', $key, isset($user) ? in_array($key, $user->roles->pluck("id")->toArray()) : false, [ "id" => "roles-".$key])!!}
						            			 				{!!Form::label("roles-".$key, $value)!!}
						            			 			</div>
						            			 		</div>
						            			 	@endforeach			            			 		
					            			 	</div>
					                       </div>			            			 	
				            			   	<label class="error">{!!$errors->first('roles[]')!!}</label>     
					                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
										<div class="form-row">                    
					                      <h4 class="panel-title-primary">Permissões</h4> 					                      
				            			  	<div class="panel-secondary">
				            			  		 <p class="info">Além de veincular um grupo de permissão acima a um usúario você pode atribuir um permissão a um determinado usuário.</p>
				            			  		<div class="row">				            			 	
						            			 	@foreach ($permissions as $key => $value)
						            			 		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						            			 			<div class="form-row">
						            			 				{!!Form::checkbox('permissions[]', $key, isset($user) ? in_array($key, $user->permissions->pluck("id")->toArray()) : false, [ "id" => "permissions-".$key])!!}
						            			 				{!!Form::label("permissions-".$key, $value)!!}
						            			 			</div>
						            			 		</div>
						            			 	@endforeach			            			 		
				            			 		</div>
				            			  	</div>
				            			   <label class="error">{!!$errors->first('permissions[]')!!}</label>   
					                    </div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="form-row">                    
					                       {!!Form::label('status', 'Status')!!}
				            			   {!!Form::select('status', ['1' => 'Ativo',  '2' => 'Inativo'], null, ['placeholder' => "Selecione"]) !!}	
				            			   <label class="error">{!!$errors->first('status')!!}</label>                      
						                </div>
									</div>
								</div>
							@endshield								
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