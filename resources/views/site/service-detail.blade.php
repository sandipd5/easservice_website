@extends('layouts.master-site')

@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="nav-tp">
            <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="header-contact">
                                <ul>
                                    <li><i class="fa fa-phone"></i><a href="callto:039">98000000000</a></li>
                                    <li><i class="fa fa-envelope"></i><a href="mailto:">easyservice@gmail.com</a></li>
                                    <li>
                                        <div class="header-social">
                                            <ul>
                                                <li><a href="https://www.facebook.com/EasyService/" target="_self"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="google plus"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
    </div>
    <section id="main-navigation">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="nav-brand" href="{{ route('home-page') }}"><img src="/assets/images/easy-2.png" title="Easy Service"></a>
                </div>
                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-left navbar-fixed right">
                        <li><a href="{{ route('home-page') }}">Home</a></li>
                        <li><a href="{{ route('setting-page', ['about']) }}">about</a></li>
                        <li class="dropdown nav-portfolio">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Services <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        @foreach ($services as $key => $serviced)
                            <li><a href="{{ route('service-details', [$serviced->id]) }}">{{ $serviced->title }}</a></li>
                            @endforeach
                        </ul>
                        </li>
                    
                        <li><a href="{{ route('all-news') }}">news</a></li>
                        <li ><a href="{{ route('contact-page') }}">contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</nav>
<div id="clearfix"></div>
<section id="site-label">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 site-label text-center" style="
                margin-top: 120px;">
                <h3>Our Services</h3>
            </div>
        </div>
    </div>
</section>
<section id="services-more">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 s-more">
                <img src="{{ $service->image }}" class="img-responsives">
                <h3>{{ $service->title }}</h3>
                <p>{!! $service->description !!}</p>
            </div>
        </div>
    </div>
</section>

@endsection
