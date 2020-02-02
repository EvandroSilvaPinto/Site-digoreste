@extends('layouts._app')

@section('content')
@include('site/includes/header')

<section id="contacts">
    <div class="contact" data-aos="fade-right">
        <div class="container">
            <div class="title">
                <div class="row">
                    <span>CONTATO</span>
                </div>
            </div>
            <div class="form">
                <form action="POST" id="contact-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" id="name" placeholder="NOME">
                        </div>
                        <div class="col-md-8">
                            <input type="email" name="email" id="email" placeholder="E-MAIL">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="phone" id="phone" placeholder="TELEFONE">
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="subject" id="subject" placeholder="ASSUNTO">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="text" id="text" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn-send">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="adress" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h3>Getúlio Vargas - 24h</h3>
                    <a href="tel:+55-65-3682-3005">(65) 3682-3005</a> •
                    <a href="tel:+55-65-99316-8672">(65) 99316-8672</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Av. do CPA</h3>
                    <a href="tel:+55-65-3682-3005">(65) 3682-3005</a> •
                    <a href="tel:+55-65-99316-8672">(65) 99316-8672</a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <h3>Várzea Grande</h3>
                    <a href="tel:+55-65-3682-3005">(65) 3682-3005</a> •
                    <a href="tel:+55-65-99316-8672">(65) 99316-8672</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site/includes/footer')
@endsection