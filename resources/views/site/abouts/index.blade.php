@extends('layouts._app')

@section('content')
@include('site/includes/header')

<section id="abouts">
	<div class="abouts">
		<div class="container">
			<div class="title" data-aos="fade-up" data-aos-duration="3000">
				<h1>{!!$abouts->title!!}</h1>
			</div>
			<div class="content" data-aos="fade-up" data-aos-duration="1500">
				<p>{!!$abouts->text!!}</p>
			</div>
		</div>
	</div>
</section>

<section id="boxs">
	<div class="container">
		<div class="boxs">
			<div class="row">
				<div class="col-md-4">
					<div class="mission">
						<div class="title" data-aos="fade-up" data-aos-duration="1500">
							<h1>MISSÃO</h1>
						</div>
						<div class="content" data-aos="fade-up" data-aos-duration="1500">
							<p>“Servir comida oriental com qualidade e confiança, de forma rápida e preço justo, com uma
								equipe capacitada para satisfazer os clientes”</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="view">
						<div class="title" data-aos="fade-up" data-aos-duration="1500">
							<h1>VISÃO</h1>
						</div>
						<div class="content" data-aos="fade-up" data-aos-duration="1500">
							<p>“Ser a rede de culinária oriental mais pratica, rentável e desejada para o Centro Oeste
								até 2022”</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="value">
						<div class="title" data-aos="fade-up" data-aos-duration="1500">
							<h1>VALORES</h1>
						</div>
						<div class="content" data-aos="fade-up" data-aos-duration="1500">
							<p>Somos JOVENS, somos PRÁTICOS, somos ANTENADOS e estaremos sempre em busca de melhorarmos
								e sermos cada vez mais INOVADORES.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('site/includes/footer')
@endsection