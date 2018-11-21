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
                            <li><a href="{{ route('service-details', [$service->id]) }}">{{ $service->title }}</a></li>
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="clearfix"></div>
<section id="site-label">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 site-label text-center">
                <h3>Latest News</h3>
            </div>
        </div>
    </div>
</section>
<section id="main-blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-wrapper">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 news-little">
                    @foreach ($allNews as $news)
                    <article class="article">
                        <img src="{{ $news->image }}">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 a_content">
                            <div class="a_calender">
                                <day>{{ $news->date->format('d') }}</day><br><span>{{ $news->date->format('M') }}</span>
                                <br><span>{{ $news->date->format('Y') }}</span>
                            </div>
                            <div class="a_text">
                                <h3>{{ $news->title }}</h3>
                                <p class="a_author">
                                    by {{ $news->author }}
                                </p>
                                <p class="a_news">{{ substr(strip_tags($news->description), 0, 300) }}</p>
                                <a href="{{ route('news-details', [$news->id]) }}" class="continue">-Continue Reading</a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 news-widget">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ra">
                        <h3>RECENT POST</h3>
                        @foreach ($allNews as $key => $news)
                        <?php if ($key > 4) break; ?>
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 rcp-wrapper no-padding">
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ra-img no-padding">
                                <a href="{{ route('news-details', [$news->id]) }}"><img src="{{ $news->image }}"></a>
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 ra-txt">
                                <h3><a href="{{ route('news-details', [$news->id]) }}" class="side-news">{{ $news->title }}</a></h3>
                                <p>by {{ $news->author }}</p>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 fb-feed">
                        <h3>Facebook Feed</h3>
                        <div class="fb-page" data-href="https://www.facebook.com/EasyService/" data-tabs="timeline"
                            data-small-header="true" data-adapt-container-width="true" data-hide-cover="false"
                            data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/EasyService/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/EasyService/">Easy Service</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
