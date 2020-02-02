@extends('layouts._app')

@section('content')
@include('site/includes/header')

<section id="adress">
	<div class="adress">
		<div class="container">
			<div class="row">
				<div class="title" data-aos="fade-up" data-aos-duration="1500" data-aos-duration="2500">
					<h1>NOSSOS RESTAURANTES</h1>
				</div>
			</div>
			@foreach ($adress as $item)

			<div class="row">
				<div class="col-md-6">
					<div class="img" data-aos="fade-up" data-aos-duration="1500" data-aos-duration="1500">
						{!!img($item->image, 705, 452, true, true)!!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="text">
						<div class="titulo" data-aos="fade-up" data-aos-duration="1500" data-aos-duration="2000">
							<a href="{!!$item->link!!}" target="_blank">
								<h3>{!!$item->title!!}</h3>
							</a>
						</div>
						<div class="content" data-aos="fade-up" data-aos-duration="1500" data-aos-duration="2000">
							<p>{!!$item->text!!}</p>
						</div>
						<div class="button" data-aos="fade-up" data-aos-duration="1500" data-aos-duration="2000">
							<a href="{!!$item->link!!}" target="_blank">COMO CHEGAR</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</section>


@include('site/includes/footer')
@endsection