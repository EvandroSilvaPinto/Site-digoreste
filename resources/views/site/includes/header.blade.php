<header>
    {{-- <section id="header">
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="logo" data-aos="fade-down" data-aos-duration="1500">
                            <a href="#">{!!img('logo.png')!!}</a>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 hidden-xs">
                        <div class="navbar">
                            <ul>
                                <li><a href="{!! route('site-home') !!}">Home</a></li>
                                <li {!!(Route::currentRouteName()=="site-abouts" ) ? 'class="active"' : '' !!}><a
                                        href="{!! route('site-abouts') !!}">O Japidinho</a></li>
                                <li {!!(Route::currentRouteName()=="site-menu" ) ? 'class="active"' : '' !!}><a
                                        href="{!! route('site-menu') !!}">Cardápio</a></li>
                                <li {!!(Route::currentRouteName()=="site-adress" ) ? 'class="active"' : '' !!}><a
                                        href="{!! route('site-adress') !!}">Lojas</a></li>
                                <li {!!(Route::currentRouteName()=="site-contact" ) ? 'class="active"' : '' !!}><a
                                        href="{!! route('site-contact') !!}">Contato</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm col-xs-6">
                        <div class="menu-open">
                            <a id="js" class="--">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-mobile">
            <div class="menu-mobile">
                <ul>
                    <li><a href="{!! route('site-home') !!}">Home</a></li>
                    <li {!!(Route::currentRouteName()=="site-abouts" ) ? 'class="active"' : '' !!}><a
                            href="{!! route('site-abouts') !!}">O Japidinho</a></li>
                    <li {!!(Route::currentRouteName()=="site-menu" ) ? 'class="active"' : '' !!}><a
                            href="{!! route('site-menu') !!}">Cardápio</a></li>
                    <li {!!(Route::currentRouteName()=="site-adress" ) ? 'class="active"' : '' !!}><a
                            href="{!! route('site-adress') !!}">Lojas</a></li>
                    <li {!!(Route::currentRouteName()=="site-contact" ) ? 'class="active"' : '' !!}><a
                            href="{!! route('site-contact') !!}">Contato</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section id="slider">
        <div class="slider">
            @foreach($slide as $item)

            <div class="item">
                {!! img($item->image, 1920, 500, true, true) !!}
            </div>

            @endforeach
        </div>
    </section>
    <section id="reference">
        <div class="reference" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
                <div class="content text-center">
                    <h2>{!!img('aspasInicio.png')!!}{!!$reference->text!!}{!!img('aspasFim.png')!!}</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="delivery">
        <div class="delivery" data-aos="fade-right">
            <a href="#" target="_blank">{!!img('delivery.png')!!}</a>
        </div>
    </section> --}}
</header>