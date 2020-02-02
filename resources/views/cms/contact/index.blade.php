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
                            <a href="{!!route('cms-contact')!!}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Contatos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-default">
                        <h3><strong> CONTATOS</strong></h3>
                        {!! Form::open(['method' => 'get', 'autocomplete' => 'on', 'route' => ['cms-contact']]) !!}
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('name', 'Nome')!!}
                                    {!!Form::text('name') !!}
                                    <label class="error">{!!$errors->first('name')!!}</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    {!!Form::label('email', 'E-mail')!!}
                                    {!!Form::text('email') !!}
                                    <label class="error">{!!$errors->first('email')!!}</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
                                    <button class="pull-right btn-primary">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            @include('layouts._alerts')
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-default list">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Assunto</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $value)
                                <tr>
                                    <td data-label="Nome">{!!$value->name!!}</td>
                                    <td data-label="Assunto">{!!$value->subject!!}</td>
                                    <td data-label="Status">{!!$value->status()!!}</td>
                                    <td data-label="Ações">

                                        <a href="{!!route('cms-contact-show', $value->contact_id)!!}" class="btn-secondary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!!$contact->appends(Request::input())->render()!!}
                </div>
            </div>
        </div>
    </div>
</section>
@include('cms.includes.footer')
@endsection