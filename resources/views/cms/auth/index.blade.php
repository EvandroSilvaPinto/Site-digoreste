@extends('layouts._app')

@section('content')	
<div class="wrapper">
	<div class="vertical-align">	
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-lg-offset-4 col-md-6 col-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
					<div class="text-center">
						<a href="{{route('cms-home')}}" class="logo">
							{!!img("logo-cms.png", array("alt" => ""))!!}
						</a>
					</div>
					<div class="box">
						{!! Form::open(['method' => 'post', 'autocomplete' => 'on', 'route' => ['cms-auth']]) !!}           		    
			            	<div class="row">
								<div class="col-lg-12 text-center">
									<div class="form-row">
										<h2 class="title">ADMINISTRAÇÃO</h2>
										<hr>
									</div>
								</div>
							</div>
							@include('layouts._alerts')		
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                       {!!Form::label('email', 'Email')!!}
			            			   {!!Form::text('email') !!}	                    
					                </div>
								</div>								
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="form-row">                    
				                    	{!!Form::label('password', 'Senha')!!}
			            			   	{!!Form::password('password') !!}	   
				                    </div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-row">
										<div  class="pull-left">
											<input type="checkbox" name="remember" id="remember" value="TRUE">	<label for="remember">Lembrar-me</label>
										</div>
										<button class="pull-right btn-primary">Entrar <i class="fa fa-sign-in" aria-hidden="true"></i></button>
									</div>
								</div>
							</div>	           	            
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection