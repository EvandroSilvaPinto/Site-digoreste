@extends('layouts._app')
@section('content')
@include('site/includes/header')

<section id="menu">
    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h1>CARDÁPIO</h1>
                </div>
            </div>
            <div class="row">
                <div class="navbar">
                    <ul>
                        @php
                        $i = 0;
                        @endphp
                        @foreach ($category as $item)
                        @php
                        switch ($i) {
                        case 0:
                        $idFor = '"tab1"';
                        break;
                        case 1:
                        $idFor = '"tab2"';
                        break;
                        case 2:
                        $idFor = '"tab3"';
                        break;
                        case 3:
                        $idFor = '"tab4"';
                        break;
                        default:
                        # code...
                        break;
                        }
                        @endphp
                        <li><input type="radio" name="tabs" class="rd_tabs" id={!!$idFor!!}>
                            <label for={!!$idFor!!}>
                                <a>{!!$item->title!!}</a>
                            </label>
                            <div class="subcategory">
                                <div class="container">
                                    @foreach ($subcategorys as $sub)
                                    <div class="row">
                                        <details>
                                            <summary><b>{!!$sub->title!!}</b></summary>
                                            <div class="row">
                                                @foreach ($products as $prod)
                                                <div class="col-md-3 col-sm-3">
                                                    <div class="img">
                                                        {!! img($prod->image, 341, 238, true, true) !!}
                                                    </div>
                                                    <div class="nome">
                                                        <h3>{!!$prod->title!!}</h3>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </details>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


@include('site/includes/footer')
@endsection