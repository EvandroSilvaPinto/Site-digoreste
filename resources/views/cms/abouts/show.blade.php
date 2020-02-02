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
							<a href="{!!route('cms-abouts')!!}"><i class="fa fa-angle-double-right"
									aria-hidden="true"></i> Quem Somos</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($abouts)) ? 'Novo'
								: 'Editar'!!}</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($abouts))
						{!! Form::model($abouts, ['route' => ['cms-abouts-update', $abouts->abouts_id], 'method' =>
						'put']) !!}
						@else
						{!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-abouts-create']])
						!!}
						@endif
						<h3><strong> CADASTRO QUEM SOMOS</strong></h3>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-row">
									{!!Form::label('title', 'Titulo ')!!}
									{!!Form::text('title') !!}
									<label class="error">{!!$errors->first('title')!!}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-row">
									{!!Form::label('text', 'Texto')!!}
									{!!Form::textarea('text') !!}
									@ckeditor('text')
									<label class="error">{!!$errors->first('text')!!}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-row">
									{!!Form::label('status', 'Status')!!}
									{!!Form::select('status', ['1' => 'Ativo', '2' => 'Inativo'], null, ['placeholder'
									=> "Selecione"]) !!}
									<label class="error">{!!$errors->first('status')!!}</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="form-row">
									<button class="pull-right btn-primary">Salvar <i class="fa fa-check-square"
											aria-hidden="true"></i></button>
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