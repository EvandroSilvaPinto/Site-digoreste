<!DOCTYPE html>
<html lang="pt-BR" itemscope itemtype="http://schema.org/WebPage">
<head>
    <!--  Start meta tags -->    
    <title>{{Config::get('app.appTitle')}}</title>
    <meta name="csrf-token" content="{!!csrf_token()!!}"/>
    <!-- AOS Scroll animate -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <base href="{{url("/")}}">
    <link rel="canonical" href="{{url()->current()}}" />
    <link rel="alternate" type="application/rss+xml"  title="RSS Feed"  href="{{route('feed')}}"/>
    <meta charset="UTF-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="{{Config::get('app.appKeywords')}}"/>
    <meta name="description" content="{{Config::get('app.appDescription')}}">
    <meta name="robots" content="index,follow,noodp"/>
    <meta name="language" content="portuguese"/>

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{Config::get('app.appTitle')}}">
    <meta itemprop="description" content="{{Config::get('app.appDescription')}}">
    <meta itemprop="image" content="{{Config::get('app.appImage')}}">

    <!-- Twitter Card data -->
    <meta name="twitter:site" content="{{url("/")}}">
    <meta name="twitter:title" content="{{Config::get('app.appTitle')}}">
    <meta name="twitter:description" content="{{Config::get('app.appDescription')}}">
    <meta name="twitter:image:src" content="{{Config::get('app.appImage')}}">

    <!-- Open Graph data -->
    <meta property="og:locale" content="pt_BR"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{Config::get('app.appTitle')}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:image" content="{{Config::get('app.appImage')}}"/>
    <meta property="og:description" content="{{Config::get('app.appDescription')}}"/>
    <meta property="og:site_name" content="{{url("/")}}"/>
    <!-- End meta tags -->
    <!--Start loading style -->
    @if (file_exists("public/css/".Route::currentRouteName().".css"))
      <link rel="stylesheet" href="{{asset('public'.elixir('css/'.Route::currentRouteName().'.css'))}}">  
    @else
      <link rel="stylesheet" href="{{asset('public'.elixir('css/default.css'))}}"> 
    @endif

    <!-- Start loading the favicon-->
    <link rel="shortcut icon" href="{{asset('public')}}/favicon.png" type="image/png">

    <!-- Font style Ubuntu-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&display=swap" rel="stylesheet">
</head>
<body>