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
                            <a href="{!!route('cms-contact')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contato</a>
                        </li>
                        <li>
                            <a><i class="fa fa-angle-double-right" aria-hidden="true"></i> Visualizar Mensagem</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-default">
                        <h3><strong> CONTATOS</strong></h3>
                        {!! Form::model($contact,['route' => ['cms-contact-update', $contact->contact_id], 'method' => 'put']) !!}
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('name', 'Nome')!!}
                                    {!!Form::text('name', null, ['disabled'=> true, 'style'=>"background:#fff"] ) !!}
                                    <label class="error">{!!$errors->first('name')!!}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('email', 'Email')!!}
                                    {!!Form::text('email', null, ['disabled'=> true, 'style'=>"background:#fff"]) !!}
                                    <label class="error">{!!$errors->first('email')!!}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('phone', 'Telefone')!!}
                                    {!!Form::text('phone', null, ['disabled'=> true, 'style'=>"background:#fff"]) !!}
                                    <label class="error">{!!$errors->first('phone')!!}</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('subject', 'Assunto')!!}
                                    {!!Form::text('subject', null, ['disabled'=> true, 'style'=>"background:#fff"] ) !!}
                                    <label class="error">{!!$errors->first('subject')!!}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('text', 'Mensagem')!!}
                                    {!!Form::textarea('text', null, ['disabled'=> true, 'style'=>"background:#fff"])!!}
                                    @ckeditor('text')
                                    <label class="error">{!!$errors->first('text')!!}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('status', 'Status')!!}
                                    {!!Form::select('status', ['1' => 'Lido', '2' => 'Não Lido'], null, ['placeholder' => "Selecione"]) !!}
                                    <label class="error">{!!$errors->first('status')!!}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <button class="pull-right btn-primary">Salvar <i class="fa fa-check-square" aria-hidden="true"></i></button>
                                    <a href="{!!route('cms-contact')!!}" class="pull-right btn-secondary">Voltar <i class="fa fa-reply" aria-hidden="true"></i></a>
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