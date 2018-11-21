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
                            @foreach ($services as $key => $service)
                            <li> <a href="{{ route('service-details', [$service->id]) }}">{{ $service->title }}</a></li>
                           
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

@foreach($notice as $key => $notices)
<div id="boxes">
<div id="dialog" class="window" style="margin-top:150px;"> 
<div id="san">
<a href="#" class="close agree"><img src="gallery/close-512.png" width="30px" style="float:right; margin-right: -5px; margin-top: -8px;"></a>

<img src="{{ $notices->image }}" alt="Easy Service" style="height: auto;width: 600px;">

</div>
</div>
<div style="width: 2478px; font-size: 32pt; color:white; height: 50px; display: none; opacity: 0.4;" id="mask"></div>
</div>
@endforeach



<section id="cover">
    <div class="container-fluid">
        <div class="row">
            <section class="cd-hero" >
                <ul class="cd-hero-slider">
                    @foreach($galleries as $key => $gallery)
                    <li class="cd-bg-video {{ $key == 0 ? 'selected' : '' }}">
                        <div class="cd-full-width">
                            <h1 class="animatable fadeInUp {{ $gallery->type == 'video' ? 'delay' : '' }}">
                                {{ $gallery->title }}
                            </h1>
                            <p class="animatable fadeInUp {{ $gallery->type == 'video' ? 'delay1' : '' }}">
                                {{ $gallery->content }}
                            </p>
                            <a href="{{ $gallery->btn_link }}"
                                class="button-cover btn btn-default animatable fadeInUp
                                {{ $gallery->type == 'video' ? 'delay2' : '' }}" target="_blank">
                                {{ $gallery->btn_text }}
                            </a>
                        </div>
                        @if ($gallery->type == 'video')
                        <?php
                            $name = explode('.', $gallery->contents()->first()->source ?? '');
                            array_pop($name);
                            $name = implode('.', $name);
                        ?>
                        <div class="cd-bg-video-wrapper desktop"
                            data-video="{{ $name }}">
                        </div>
                        
                        @else
                        <div class="cd-bg-image-wrapper">
                            <div class="overlay-slider"></div>
                            <img src="{{ $gallery->contents()->first()->source ?? '' }}">
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <div class="cd-slider-nav cd-default">
                    <nav>
                        <span class="cd-marker item-1"></span>
                        <ul class="btn-nav">
                            <li class="selected">
                                <a href="#0"><i class="icon ion-ios-circle-outline"></i><span></span></a>
                            </li>
                            <li><a href="#0"><i class="icon ion-ios-circle-outline"></i><span></span></a></li>
                        </ul>
                    </nav>
                </div>
            </section>
        </div>
    </div>
</section>

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 about-wrapper text-center">
                <h3 class="main-head ">About <blue>Easy Service</blue></h3>
                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 about-txt no-padding ">
                    {!! substr($content->value,0,880) !!}
                    <a href="{{ route('setting-page', ['about']) }}" class="button btn btn-default pull-left" target="_blank">
                        Read More
                    </a>
                </div>
                <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 about-img no-padding ">
                    <img src="{{ $content->image }}" alt="Easy Service" title="Easy Service">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="service">
    <div class="services-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 service-wrapper text-center">
                <h3 class="main-head"><white>Services</white> <blue>we</blue> <white>Provide</white></h3>
                @foreach ($services as $key => $service)
                <div class="col-xs-12 col-md-5 service-more {{ $key % 2 == 0 ? 'text-left' : 'col-md-offset-2' }}">
                    <i class="{{ $service->icon }}"></i>
                    <h3 align="{{ $key % 2 != 0 ? 'left' : '' }}">{{ $service->title }}</h3>
                    <p align="{{ $key % 2 != 0 ? 'left' : '' }}">{{ $service->info }}</p>
                    <a href="{{ route('service-details', [$service->id]) }}"
                        class="button btn btn-default {{ $key % 2 != 0 ? 'pull-left' : '' }}" style="padding: 10px 20px 10px 20px !important;
                        font-size: 1em;text-transform: capitalize !important;margin-left: 17%;">
                        Read More
                    </a>
                </div>
                @endforeach;
            </div>
        </div>
    </div>
</section>

<section id="quote-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 quote-section">
                <div class="col-xs-8 col-md-6 text-left no-padding">
                    <h3>Bulk sms for emerging organizational needs</h3>
                </div>
                <div class="col-xs-4 col-md-6 text-right no-padding">
                    <a href="{{ route('contact-page') }}" class="button-cover btn btn-default pull-right"
                        data-animation="animated fadeInLeft">
                        get a quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 text-center">
                <h3 class="main-head">What our <blue>client</blue> say</h3>
                <div id="customers-testimonials" class="owl-carousel">
                    @foreach ($reviews as $review)
                    <div class="item">
                        <div class="shadow-effect">
                            <img class="img-circle" src="{{ $review->image }}" alt="">
                            <div class="testimonial-name">{{ $review->title }}</div>
                            <p>{!! $review->info !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 

<script>
    $(document).ready(function() { 
    var id = '#dialog';
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight}); 
    $('#mask').fadeIn(500); 
    $('#mask').fadeTo("slow",0.9); 
            var winH = $(window).height();
    var winW = $(window).width();
            $(id).css('top',  winH/-$(id).height());
    $(id).css('left', winW/2-$(id).width()/2);
        $(id).fadeIn(2000);  
        $('.window .close').click(function (e) {
    e.preventDefault();
    $('#mask').hide();
    $('.window').hide();
        });  
        $('#mask').click(function () {
    $(this).hide();
    $('.window').hide();
    });  
    
});
</script>

