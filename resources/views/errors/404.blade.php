@extends('layouts._app')

@section('content')
	{{Config::set('app.appTitle', '404 Página Não Encontrada')}}	 
	<div id="error">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					{!! img('404.png') !!}
					<h1>404 Página Não Encontrada</h1>
					<p class="message">
						A página ou recurso que tentou utilizar, não foi encontrado.
					</p>
					<ul>
						<li>
							<a href="{{url("/")}}">Acesse a Página Inicial</a>
						</li>
					</ul>
					<p class="corporate">&copy; 2016  {{Config::get('app.appTitle')}} - Todos os direitos reservados<p>
				</div>
			</div>
		</div>
	</div>
	@if (file_exists("public/css/404.css"))
        <link rel="stylesheet" href="{{asset('public'.elixir('css/404.css'))}}">  
    @endif
@endsection
