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
							<a href="{!!route('cms-countries')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Paises</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($countrie)) ? 'Novo' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($countrie))
			                {!! Form::model($countrie, ['route' => ['cms-countrie-update', $countrie->countries_id], 'method' => 'put']) !!}
			            @else
			                {!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-countrie-create']]) !!}
			            @endif        		    
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('name', 'Nome')!!}
			            			   {!!Form::text('name') !!}	
			            			   <label class="error">{!!$errors->first('name')!!}</label>                      
					                </div>
								</div>	
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('initials', 'Sigla')!!}
			            			   {!!Form::text('initials') !!}	
			            			   <label class="error">{!!$errors->first('initials')!!}</label>                      
					                </div>
								</div>															
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
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