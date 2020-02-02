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
							<a href="{!!route('cms-product')!!}"><i class="fa fa-angle-double-right"
									aria-hidden="true"></i> Produto</a>
						</li>
						<li>
							<a><i class="fa fa-angle-double-right" aria-hidden="true"></i> {!!(!isset($product)) ?
								'Novo' : 'Editar'!!}</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-default">
						@if(isset($product))
						{!! Form::model($product, ['route' => ['cms-product-update', $product->product_id], 'method' =>
						'put']) !!}
						@else
						{!! Form::open(['method' => 'post', 'autocomplete' => 'off', 'route' => ['cms-product-create']])
						!!}
						@endif
						<h3><strong> CADASTRO DE PRODUTO</strong></h3>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-row">
									{!!Form::label('title', 'Nome Produto ')!!}
									{!!Form::text('title') !!}
									<label class="error">{!!$errors->first('title')!!}</label>
								</div>
							</div>
						</div>
						<div class="form-row">
							<label for="category"> Categoria</label>
							<select name="category_id" id="category_id">
								@php
									$seleeasdas = "";	
								@endphp
								@foreach ($category as $item) {
									@php
										if(isset($product)){
											if($product->category_id == $item->category_id){
												$seleeasdas = "selected";
											}
										}	
									@endphp
									<option value="{!!$item->category_id!!}" {!!$seleeasdas!!} >{!!$item->title!!}</option>

									@endforeach
							</select>
						</div>
						<div class="form-row">
							<label for="subcategory"> SubCategoria</label>
							
							@if(isset($product))

							@php
								if($product->subcategory_id == $item->subcategory_id){
									$seleeasdas = "selected";
								}									
							@endphp

							<select name="subcategory_id" id="subcategory_id">
									@foreach($subcategory as $item)
										<option value="{!!$item->subcategory_id!!}" {!!$seleeasdas!!} >{!!$item->title!!}</option>
									@endforeach
							</select>
							
							@else


							<select name="subcategory_id" id="subcategory_id">
							</select>


							@endif
							
				
						</div>
						<div class="row box-image">
							<div class="col-lg-12">
								<div class="form-row">
									<label for="">Foto</label>
									<input type="file" class="FlexUpload" data-url="{{route('flexUpload')}}"
										data-entity="Product"
										data-entity-id="{!!(isset($product)) ? $product->product_id : ''!!}"
										name="image">
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