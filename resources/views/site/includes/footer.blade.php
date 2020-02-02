<footer>
    {{-- <section id="contact" {!!(Route::currentRouteName()=="site-contact" ) ? 'hidden' : '' !!}>
        <div class="contact" data-aos="fade-right">
            <div class="bg-contact-1">
                {!!img('bg-contact-1.png')!!}
            </div>
            <div class="container">
                <div class="title">
                    <div class="row">
                        {!!img('hashi.png')!!}
                        <b>#<span>DEIXE</span>SUA<span>SUGESTÃO</span></b>
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
    </section>
    <section id="footer">
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 hidden-sm hidden-xs">
                        <div class="adress">
                            <b>Nossos restaurantes</b><br><br>
                            <b>japidinho cuiabá 24h - todos os dias</b><br>
                            <span>av. getúlio vargas</span><br>
                            <b>japidinho cuiabá - seg a dom 18h as 23h</b><br>
                            <span>av. do cpa 1856, ed. cuiabá office tower</span><br>
                            <b>japidinho várzea grande - ter a dom 18h as 23h</b><br>
                            <span>av. pres. arthur bernardes s/n, jd aeroporto</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="logo-footer">
                            <a href="#header">{!!img('logo-footer.png')!!}</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6">
                        <div class="text">
                            <ul>
                                <li><b><a href="{!! route('site-abouts') !!}">O Japidinho</a></b></li>
                                <li><b><a href="{!! route('site-menu') !!}">Cardápio</a></b></li>
                                <li><b><a href="{!! route('site-adress') !!}">Lojas</a></b></li>
                                <li><b><a href="{!! route('site-contact') !!}">Contato</a></b></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</footer>