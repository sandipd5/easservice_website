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
<div id="clearfix"></div>
<section id="site-label">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 site-label text-center" style="
                margin-top: 115px;">
                <h3>Contact us</h3>
            </div>
        </div>
    </div>
</section>
<section id="main-contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 location-map" id="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1050.4121631196458!2d85.33201323175902!3d27.68171855483375!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xea7713119dbad624!2sEasy+Service+Private+Limited!5e0!3m2!1sen!2snp!4v1510469893222"
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="row contact-container">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 talk-form">
                <h3 class="heading-default">Talk To Us</h3>
                <form action="{{ route('send-email') }}" method="post" id="email-form">
                    <div class="col-xs-12 col-md-4 col-sm-4 col-md-4" style="padding-left: 0 !important;">
                        <input type="text" placeholder="Name" name="name">
                    </div>
                    <div class="col-xs-12 col-md-4 col-sm-4 col-md-4" style="padding-left: 0 !important;">
                        <input type="text" placeholder="E-mail" name="email">
                    </div>
                    <div class="col-xs-12 col-md-4 col-sm-4 col-md-4"
                        style="padding-left: 0 !important;padding-right: 0 !important;">
                        <input type="text" placeholder="Phone" name="phone">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                        <textarea rows="10" placeholder="More Details Here..." name="details"></textarea><br/>
                        <button type="submit" class="button btn btn-default" id="send-btn">Send</button>
                        <span class="" id="email-response"></span>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 contact-info">
                <h3 class="heading-default">Contact Info</h3>
                <ul>
                    <li class="address">&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Address:</b>&nbsp;&nbsp;Sankhamul, Siddhartha Marga, Kathmandu, Nepal
                    </li>
                    <li class="phone">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Phone:</b>&nbsp;&nbsp;01-4784912</li>
                    <li class="e-mail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>E-mail:</b>&nbsp;&nbsp;info@easy.com.np
                    </li>
                    <li class="fax">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fax:</b>&nbsp;&nbsp;01-4400000</li>
                    <li class="globe">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Website:</b>&nbsp;&nbsp;www.easy.com.np</li>
                </ul>
                <ul class="social">
                    <li><a href="https://www.facebook.com/EasyService/"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                    <li><a href="#"><i class="ion-email"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var $form = $('#email-form');
        var $btn  = $('#send-btn');

        $form.on('submit', function() {
            $btn.attr('disabled', true);

            var name    = $form.find('input[name=name]').val();
            var email   = $form.find('input[name=email]').val();
            var phone   = $form.find('input[name=phone]').val();
            var details = $form.find('textarea[name=details]').val();

            if (!name || !email || !phone || !details) {
                $("#email-response").addClass('text-danger').removeClass('text-success')
                    .html('Error Sending Email').show().delay(5000).fadeOut();
                $btn.attr('disabled', false);
                return false;
            }

            $.ajax({
                method: 'POST',
                url : $form.attr('action'),
                data : {name: name, email: email, phone:phone, details: details},
                dataType: 'html'
            }).done(function(response) {
                $btn.attr('disabled', false);

                $("#email-response").addClass('text-success').removeClass('text-danger')
                    .html('Email Sent Successfully').show().delay(5000).fadeOut();
            }).fail(function(response) {
                $("#email-response").addClass('text-danger').removeClass('text-success')
                    .html('Error Sending Email').show().delay(5000).fadeOut();
                $btn.attr('disabled', false);
            });

            return false;
        })
    });
</script>
@endsection
