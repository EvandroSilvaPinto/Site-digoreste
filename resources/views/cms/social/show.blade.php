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
							<a href="{!!route('cms-social')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Social</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($social)) ? 'Novo' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($social))
			                {!! Form::model($social, ['route' => ['cms-social-update', $social->social_id], 'method' => 'put']) !!}
			            @else
			                {!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-social-create']]) !!}
			            @endif        		    
			              <h3><strong> CADASTRO DE SOCIAL</strong></h3>		
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('name', 'Rede Social ')!!}
			            			   {!!Form::text('name') !!}	
			            			   <label class="error">{!!$errors->first('name')!!}</label>                      
					                </div>
								</div>	
							</div>
							<div class="row box-image">
								<div class="col-lg-12">
									<div class="form-row"> 
										<label for="">Foto</label>
										<input type="file" class="FlexUpload" data-url="{{route('flexUpload')}}" data-entity="Social" data-entity-id="{!!(isset($social)) ? $social->social_id : ''!!}" name="image">											   		                    
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