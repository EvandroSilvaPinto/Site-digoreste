<div class="sidebar">
	<div class="profile text-center">
		<figure>
			{!!img(@Auth::user()->image, 120, 120, true, true)!!}
		</figure>
		<h1 class="name">Olá {!!@Auth::user()->first_name." ".@Auth::user()->last_name!!}</h1>
		<div class="text">
			Seja bem vindo (a)
		</div>
	</div>
	<ul>
		<li class="active">
			<a href="{{route('cms-home')}}">
				<i class="fa fa-home" aria-hidden="true"></i> Home
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-slide')}}">
				<i class="fa fa-picture-o" aria-hidden="true"></i> Slides
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-reference')}}">
				<i class="fa fa-thumb-tack" aria-hidden="true"></i> Referência
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-summary')}}">
				<i class="fa fa-picture-o" aria-hidden="true"></i> Resumo Fotos
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-social')}}">
				<i class="fa fa-facebook" aria-hidden="true"></i> Social
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-media')}}">
				<i class="fa fa-youtube-play" aria-hidden="true"></i> Video
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-abouts')}}">
				<i class="fa fa-book" aria-hidden="true"></i> Quem Somos
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-adress')}}">
				<i class="fa fa-map-marker" aria-hidden="true"></i> Lojas
			</a>
		</li>
		<li class="">
			<a href="{{route('cms-contact')}}">
				<i class="fa fa-envelope-o" aria-hidden="true"></i> Contato
			</a>
		</li>
		<li class="sub-menu">
			<a>
				<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Produtos
			</a>
			<ul>
				@shield('cms-category')
				<li>
					<a href="{!!route('cms-category')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i>
						Categoria</a>
				</li>
				@endshield
				@shield('cms-subcategory')
				<li>
					<a href="{!!route('cms-subcategory')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i>
						SubCategoria</a>
				</li>
				@endshield
				@shield('cms-product')
				<li>
					<a href="{!!route('cms-product')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i>
						Produto</a>
				</li>
				@endshield
			</ul>
		</li>
		<li class="sub-menu">
			<a>
				<i class="fa fa-cog" aria-hidden="true"></i> Configurações
			</a>
			<ul>
				@shield('cms-countries')
				<li>
					<a href="{!!route('cms-countries')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i>
						Paises</a>
				</li>
				@endshield
				@shield('cms-states')
				<li>
					<a href="{!!route('cms-states')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Estados</a>
				</li>
				@endshield
				@shield('cms-cities')
				<li>
					<a href="{!!route('cms-cities')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Cidades</a>
				</li>
				@endshield
				@shield('cms-sexes')
				<li>
					<a href="{!!route('cms-sexes')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Sexo</a>
				</li>
				@endshield
				@shield('cms-users')
				<li>
					<a href="{!!route('cms-users')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Usuários</a>
				</li>
				@endshield
				@shield('cms-roles')
				<li>
					<a href="{!!route('cms-roles')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Grupos de
						Usuários</a>
				</li>
				@endshield
				@shield('cms-log-errors')
				<li>
					<a href="{!!route('cms-log-errors')!!}"><i class="fa fa-caret-right" aria-hidden="true"></i> Log de
						erros</a>
				</li>
				@endshield
			</ul>
		</li>
		<li>
			<a href="{!!route('cms-auth-logout')!!}">
				<i class="fa fa-sign-out" aria-hidden="true"></i> Sair
			</a>
		</li>
	</ul>
</div>