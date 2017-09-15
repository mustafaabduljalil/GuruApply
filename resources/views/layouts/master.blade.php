<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/css/bootstrap-formhelpers.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='{{asset('css/chosen.min.css')}}' rel='stylesheet' type='text/css'>
    <link href='{{asset('css/magicsuggest-min.css')}}' rel='stylesheet' type='text/css'>

    @yield('styles')
    <title>@yield('title')</title>
</head>

<body>
<div class="container-fluid nopadd">
    <header id="home">
        <div class="navbar-header navbar-fixed-top">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="secondary-nav">
                                <li><a href="{{route('about')}}">about us</a></li>
                                <li><a href="#">application process</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="pull-right text-right commondiv">
                                    <ul class="secondary-nav secondary-nav-new">
                                        @if(Auth::user())
                                        <li class="notify"><a href="#">Notification <span></span></a></li>
                                        @endif
                                        @if(Auth::guest())
                                                <li><a href="#login-modal" role="button" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                                {{--<li><a href="#" role="button" data-toggle="modal" data-target="#register-modal">Register</a></li>--}}
                                        @endif

                                    </ul>
                                <div class="searchbox">
                                    <form action="">
                                        <input type="search" placeholder="Search......" name="search" class="searchbox-input" onKeyUp="buttonUp();"/>
                                        <input type="submit" class="searchbox-submit" value="" />
                                        <span class="searchbox-icon"></span>
                                    </form>
                                </div>
                                <div class="social"> <a href="#"><img src="{{asset('images/facebook.png')}}" alt="" title="" /></a> <a href="#"><img src="{{asset('images/twitter.png')}}" alt="" title="" /></a> <a href="#"><img src="{{asset('images/gplus.png')}}" alt="" title="" /></a> <a href="#"><img src="{{asset('images/linkedin.png')}}" alt="" title="" /></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-main">
                <div class="container">
                    <div class="new_nav pull-left">
                        <nav class="navbar navbar-default nav_scond">
                            <ul class="nav navbar-nav nav_two">
                                <li><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/draw.png')}}" width="50" height="44" alt=""></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Bachelors</a></li>
                                        <li><a href="#">Masters</a></li>
                                        <li><a href="#">Student Guide</a></li>
                                        <li><a href="#">Scholarships</a></li>
                                        <li><a href="#">Ask Anything</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="logonew pull-left"> <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}"  alt=""></a> </div>
                    @if(Auth::user())
                        <div class="profile_de pull-right">
                            <div class="new_nav new_nav2 pull-left">
                                <nav class="navbar navbar-default nav_scond">
                                    <ul class="nav navbar-nav nav_two">
                                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="profile-image" src="{{Auth::user()->profile_image ? Auth::user()->profile_image : asset("images/profiledefault.png") }} " width="55" height="55" alt=""> <img src="{{asset('images/drops.png')}}" class="imgarrows" width="18" height="9" alt=""></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    @if(Auth::user()->type == "institution")
                                                        <a href="/institution">My Account</a>
                                                    @else
                                                        <a href="/student">My Account</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="notifybottom"><a href="#"><img src="{{asset('images/noti.png')}}" width="33" height="43" alt=""><span>1</span></a> </div>
                        </div>
                    @endif
                    <form method="get" action="/search">
                        {{csrf_field()}}
                        <div class="searchtop">
                            <div class="form-group country">
                                <p>Country</p>
                                <select id="countries" name="country" class="form-control bfh-countries" data-country="FR"></select>
                            </div>
                            <div class="searchinput">
                                <input name="search_title" type="text" placeholder="Search Courses & institutions...">
                                <input name="" type="submit" value="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '436651716730996',
                xfbml      : true,
                version    : 'v2.10'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    @yield('content')


    </body>

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="foot-logo"><img src="{{asset('images/foot-logo.png')}}" alt="" title="" /></div>
                <div class="row">
                    <div class="{{Auth::user()==true ? 'col-md-2' : 'col-md-3'}} col-sm-12 col-xs-12">
                        <h4>SUBSCRIBE</h4>
                        <p>Lorem ipsum dolor sit amet, cons adipiscing</p>
                        <div class="newsletter">
                            <form id="subscription_form" method="post" class="{{Auth::guest() ? 'subscrib-form' : ''}}">
                                <input type="text" value="" name="subscription_email" placeholder="Your email" />
                                <input type="hidden" name="_token" id="csrf-token" value="{{Session::token()}}" />
                                <input type="button" id="subscription_btn" value="" name="" placeholder="" />
                            </form>
                        </div>
                    </div>
                    @if(Auth::user())
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <h4>MY ACCOUNT</h4>
                        <ul class="foot-nav">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Personal Information</a></li>
                            <li><a href="#">Address</a></li>
                        </ul>
                    </div>
                    @endif
                    <div class="{{Auth::user()==true ? 'col-md-2' : 'col-md-3'}} col-sm-12 col-xs-12">
                        <h4>Courses</h4>
                        <ul class="foot-nav">
                            <li><a href="#">Certificate</a></li>
                            <li><a href="#">Bachelors</a></li>
                            <li><a href="#">Masters</a></li>
                            <li><a href="#">Doctorate</a></li>
                        </ul>
                    </div>
                    <div class="{{Auth::user()==true ? 'col-md-2' : 'col-md-3'}} col-sm-12 col-xs-12">
                        <h4>links</h4>
                        <ul class="foot-nav">
                            <li><a href="#">Bachelors</a></li>
                            <li><a href="#">Masters</a></li>
                            <li><a href="#">Student Guide</a></li>
                            <li><a href="#">Placement</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="{{Auth::user()==true ? 'col-md-2' : 'col-md-3'}} col-sm-12 col-xs-12">
                        <h4>contact</h4>
                        <p>Call : Call : 033 26527 89654 <br>
                            (09:30 AM to 06:30 PM, <br>
                            Monday to Friday) <br>
                            <a href="#">Email: dummy@gmail.com</a></p>
                        <div class="social foot-social"> <a href="#"><img src="{{asset('images/facebook.png')}}" alt="" title="" /></a> <a href="#"><img src="{{asset('images/twitter.png')}}" alt="" title="" /></a> <a href="#"><img src="{{asset('images/gplus.png')}}" alt="" /></a> <a href="#"><img src="{{asset('images/linkedin.png')}}" alt="" title="" /></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-txt">
            <div class="container">
                <p>Copyright © 2016. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-formhelpers/2.3.0/js/bootstrap-formhelpers.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.formhelpers/1.8.2/js/bootstrap-formhelpers-countries.en_US.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.formhelpers/1.8.2/js/bootstrap-formhelpers-countries.js" type="javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/venobox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/crs.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/magicsuggest-min.js')}}" type="text/javascript"></script>

<!--OWL-->
<script>
    $(document).ready(function() {
        $("#owl-demo2").owlCarousel({
            items : 4,
            itemsCustom : false,
            itemsDesktop : [1199, 3],
            itemsDesktopSmall : [979, 2],
            itemsTablet : [768, 2],
            itemsTabletSmall : false,
            itemsMobile : [479, 1],
            lazyLoad : true,
            navigation : true
        });
    });
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items : 4,
            itemsCustom : false,
            itemsDesktop : [1199, 3],
            itemsDesktopSmall : [979, 2],
            itemsTablet : [768, 2],
            itemsTabletSmall : false,
            itemsMobile : [479, 1],
            lazyLoad : true,
            navigation : true
        });
    });
    $(document).ready(function() {
        $("#owl-demo3").owlCarousel({
            items : 5,
            itemsCustom : false,
            itemsDesktop : [1199, 5],
            itemsDesktopSmall : [979, 3],
            itemsTablet : [768, 3],
            itemsTabletSmall : false,
            itemsMobile : [479, 1],
            lazyLoad : true,
            navigation : true
        });
    });
</script>
<script>
    $.stellar({
        horizontalScrolling: false,
        verticalOffset: 0
    });
    var fader = $('.big_slider');
    $(window).on('scroll', function() {
        var st = $(this).scrollTop();
        fader.css({ 'opacity' : (1 - st/600) });
    });
</script>
<script>
    function toggler(divId) {
        $("#" + divId).toggle();
    }
</script>

<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/jquery.flagstrap.js')}}"></script>
<script>
    $('#basic').flagStrap();

    $('#origin').flagStrap({
        placeholder: {
            value: "",
            text: "Country of origin"
        }
    });

    $('#options').flagStrap({
        countries: {
            "AU": "Australia",
            "GB": "United Kingdom",
            "US": "United States"
        },
        buttonSize: "btn-sm",
        buttonType: "btn-info",
        labelMargin: "10px",
        scrollable: false,
        scrollableHeight: "350px"
    });

    $('#advanced').flagStrap({
        buttonSize: "btn-lg",
        buttonType: "btn-primary",
        labelMargin: "20px",
        scrollable: false,
        scrollableHeight: "350px",
        onSelect: function (value, element) {
            alert(value);
            console.log(element);
        }
    });

</script>
@yield('scripts')

</body>
</html>


<!--popup-->
<!-- Register Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close closecustom" data-dismiss="modal" aria-label="Close">X</button>
            <!-- Begin # DIV Form -->
            <div id="div-forms">
                <!-- Begin | Lost Password Form -->
                <div class="modal-body modal-body_login">

                    <div class="commondiv panel with-nav-tabs panel-default custom_tabs custompane padsarea">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-heading nobor">
                            <ul class="nav nav-tabs nobor tablog">
                                <li class="active"><a href="#tab1default" data-toggle="tab">Login</a></li>
                                <li><a href="#tab2default" data-toggle="tab">Registration</a></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel-body custom_panel panel-bodyt">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">
                                    <div class="common title text-center loginpopup nopadd">
                                        <div class=" logindiv logindivpop common">
                                            <h2>Sign In</h2>
                                            <form id="myForm" method="post" action="{{route('login')}}">
                                                {{csrf_field()}}
                                                <p class="signoption">Sign In with</p>
                                                <div class="common signwith">
                                                    <a href="/login/facebook" class="loginBtn loginBtn--facebook">
                                                        Login with Facebook
                                                    </a>
                                                </div>
                                                <div class="clear_border2"></div>
                                                <p class="signoption">Or</p>
                                                <input name="email" class="form-control" id="email" type="email" placeholder="Enter Your Email">
                                                <input name="password" class="form-control" id="password" type="password" placeholder="Enter Your Password">
                                                <div class="common">
                                                    <input name="" type="submit" class="dark_but1 but_login" value="Sign In">
                                                </div>
                                                <div class="common forgot"> <a href="{{ route('password.request') }}">Forgot Password?</a> </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab2default">
                                    <div class="common title text-center loginpopup nopadd">
                                        <div class=" logindiv logindivpop common">
                                            <h2>Sign Up</h2>
                                            <form id="student_registration_form" class="form-horizontal" method="POST" action="{{ route('register') }}">
                                                {{csrf_field()}}
                                                <input name="name" id="name" type="text" placeholder="Enter Your Name">
                                                <input name="email" id="email" type="email" placeholder="Enter Your Email">
                                                <input name="password"id="password" type="password" placeholder="Enter Your Password">
                                                <input name="type" type="hidden" value="student">
                                                <div class="common">
                                                    <input name="" type="submit" class="dark_but1" value="Sign Up">
                                                </div>
                                                <div class="common forgot"> <a href="{{ route('register') }}">Register as Institution?</a> </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End | Lost Password Form -->
            </div>
        </div>
    </div>
</div>
<!-- login -->







