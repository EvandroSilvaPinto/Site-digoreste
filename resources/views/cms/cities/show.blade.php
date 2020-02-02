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
							<a href="{!!route('cms-cities')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Cidades</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($citie)) ? 'Nova' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($citie))
			                {!! Form::model($citie, ['route' => ['cms-citie-update', $citie->cities_id], 'method' => 'put']) !!}
			            @else
			                {!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-citie-create']]) !!}
			            @endif        		    
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('name', 'Nome')!!}
			            			   {!!Form::text('name') !!}	
			            			   <label class="error">{!!$errors->first('name')!!}</label>                      
					                </div>
								</div>															
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('countries_id', 'Pais')!!}
			            			   {!!Form::select('countries_id', [], null, ['placeholder' => "Selecione", 'disabled'=> true, 'data-active' => (isset($citie)) ? $citie->state->countrie->countries_id : ""]) !!}	
			            			   	<label class="error">{!!$errors->first('countries_id')!!}</label>     
				                    </div>
								</div>	
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('states_id', 'Estado')!!}
			            			   {!!Form::select('states_id', [], null, ['placeholder' => "Selecione", 'disabled'=> true, 'data-active' => (isset($citie)) ? $citie->states_id : ""]) !!}	
			            			   	<label class="error">{!!$errors->first('states_id')!!}</label>     
				                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('status', 'Status')!!}
				            		   {!!Form::select('status', ['1' => 'Ativo',  '2' => 'Inativo'], null, ['placeholder' => "Selecione"]) !!}				            			   	
			            			   	<label class="error">{!!$errors->first('status')!!}</label>     
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