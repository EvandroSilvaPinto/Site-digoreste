@extends('layouts._app')

@section('content')
@include('site/includes/header')

{{-- <section id="summary">
	<div class="summary">
		<div class="container">
			<div class="row">
				<div class="col-md-9 hidden-sm hidden-xs">
					<div class="galery" data-aos="fade-up" data-aos-duration="1500">
						@foreach($summary as $item)
						{!! img($item->image, 396, 264, true, true) !!}
						@endforeach
					</div>
				</div>
				<div class="col-md-3">
					<div class="content">
						@foreach ($summary as $item)
						<h1 data-aos="fade-up" data-aos-duration="1500">{!!$item->title!!}</h1>
						<p data-aos="fade-up" data-aos-duration="1500">{!!$item->text!!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="followers">
	<div class="followers">
		<div class="container">
			<div class="title" data-aos="fade-up" data-aos-duration="1500">
				<div class="row">
					{!!img('hashi.png')!!}
					<b><span>#</span>VEM<span>PRO</span>JAPIDINHO</b>
				</div>
			</div>
		</div>
	</div>
	<section id="photo">
		<div class="photo" data-aos="fade-up" data-aos-duration="1500">
			<div class="container">
				<div class="row">
					@foreach($social as $item)
					{!! img($item->image, 453, 549, true, true) !!}
					@endforeach
				</div>
			</div>
		</div>
	</section>
	<section id="img-frame">
		<div class="img-frame" data-aos="fade-up" data-aos-duration="1500">
			<div class="container">
				<div class="row">
					{!!img('moldura.png')!!}
					{!!img('moldura.png')!!}
					{!!img('moldura.png')!!}

					<div id="name">
						<div class="name" data-aos="fade-up" data-aos-duration="1500">
							<div class="container">
								<div class="row">
									@foreach($social as $item)
									<b>{!! $item->name !!}</b>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
<section id="media">
	<div class="media">
		<div class="bg-img" data-aos="fade-right">
			{!!img('gb-1.png')!!}
			{!!img('gb-2.png')!!}
			{!!img('gb-3.png')!!}
		</div>
		<div class="container">
			<div class="title" data-aos="fade-right" data-aos-duration="1500">
				<b><span>#COZINHA</span>JAPIDINHO</b>
			</div>
			<div class="video" data-aos="fade-right">
				<iframe width="660" height="315" src="https://www.youtube.com/embed/{!!$media->link!!}" frameborder="0"
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen></iframe>
			</div>
			<div class="video-mobile" data-aos="fade-right">
				<iframe width="85%" height="auto" src="https://www.youtube.com/embed/{!!$media->link!!}" frameborder="0"
					allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
					allowfullscreen></iframe>
			</div>
		</div>

	</div>
</section> --}}

@include('site/includes/footer')
@endsection