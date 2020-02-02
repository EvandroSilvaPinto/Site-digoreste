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
							<a href="{!!route('cms-log-errors')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Log de Erros</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> Visualizar</a>
						</li>
					</ul>
				</div>		
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						{!! Form::model($log_erro,['method' => 'put']) !!} 
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('code', 'Código')!!}
			            			   {!!Form::text('code', null, ['disabled'=> true]) !!}	
			            			   <label class="error">{!!$errors->first('code')!!}</label>                      
					                </div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('line', 'Linha')!!}
			            			   {!!Form::text('line', null, ['disabled'=> true]) !!}	
			            			   <label class="error">{!!$errors->first('line')!!}</label>                      
					                </div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row"> 
										{!!Form::label('message', 'Mensagem de erro')!!} 
										{!!Form::textarea('message',null,['disabled'=> true])!!}  
										<label class="error">{!!$errors->first('message')!!}</label>    		                    
					                </div>
								</div>						
							</div>
							
							<div class="row">							
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="form-row">                    
					                       {!!Form::label('file', 'Local')!!}
				            			   {!!Form::text('file', null, ['disabled'=> true]) !!}	
				            			   <label class="error">{!!$errors->first('file')!!}</label>     
					                    </div>
									</div>														
								</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">		
										<a href="{!!route('cms-log-errors')!!}" class="pull-right btn-secondary">Voltar <i class="fa fa-reply" aria-hidden="true"></i></a>
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