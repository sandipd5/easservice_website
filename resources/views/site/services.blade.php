@extends('layouts.master-site')

@section('content')
<style type="text/css">
    .navbar-nav>li>a{
        color: #000;
    }
    .navbar-nav>li>a:hover{
        color: #000;
    }
    #service{
        margin-bottom: 70vh;
        background: #fff;
    }
    .service-more{
        background: #f8f8f8;
    }
    .cd-header{
        position: relative;
    }
    #main-navigation{
        position: relative;
    }
</style>

<div id="clearfix"></div>
<section id="site-label">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 site-label text-center">
                <h3>Our Services</h3>
            </div>
        </div>
    </div>
</section>
<section id="service">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 service-wrapper text-center">
                @foreach ($services as $key => $service)
                <div class="col-xs-12 col-md-5 service-more {{ $key % 2 == 0 ? 'text-left' : 'col-md-offset-2' }}">
                    <i class="{{ $service->icon }}"></i>
                    <h3 align="{{ $key % 2 != 0 ? 'left' : '' }}">{{ $service->title }}</h3>
                    <p align="{{ $key % 2 != 0 ? 'left' : '' }}">{{ $service->info }}</p>
                    <a href="{{ route('service-details', [$service->id]) }}" class="button btn btn-default {{ $key % 2 != 0 ? 'pull-left' : '' }}"
                        style="padding: 10px 20px 10px 20px !important;
                        font-size: 1em;text-transform: capitalize !important;margin-left: 17%;">
                        Read More
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
