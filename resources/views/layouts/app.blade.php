<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @if (Auth::guest()) Home @else @yield('title') @endif</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">



    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <link href="{{url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{url('css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->

    <link href="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link href="{{url('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{url('css/owl.carousel.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{url('css/slidebars.css') }}" rel="stylesheet">


    <!-- Custom styles for this template -->

    <link href="{{url('css/style.css') }}" rel="stylesheet">
    <link href="{{url('css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{url('css/jquery.fileupload.css') }}" rel="stylesheet" />


    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                 Questionairs
             </a>
         </div>

         <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
             {{--  <li><a href="{{ url('/home') }}">Home</a></li> --}}
         </ul>

         <!-- Right Side Of Navbar -->
         <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>
</nav>

@yield('sidebar')
@yield('content')

<!-- JavaScripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-3.2.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script class="include" type="text/javascript" src="{{url('js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{url('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{url('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
<script src="{{url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{url('js/owl.carousel.js')}}" ></script>
<script src="{{url('js/jquery.customSelect.min.js')}}" ></script>
<script src="{{url('js/respond.min.js')}}" ></script>
<script src="{{url('assets/bootstrap-fileupload/bootstrap-fileupload.js')}}" ></script>

<!--right slidebar-->
<script src="{{url('js/slidebars.min.js')}}"></script>

<!--common script for all pages-->
<script src="{{url('js/common-scripts.js')}}"></script>

<!--script for this page-->
<script src="{{url('js/easy-pie-chart.js')}}"></script>
<script src="{{url('js/count.js')}}"></script>

<script>

      //owl carousel

      $(document).ready(function() {
        $("#owl-demo").owlCarousel({
          navigation : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem : true,
          autoPlay:true

      });
    });

      //custom select box

      $(function(){
        $('select.styled').customSelect();
    });
</script>

@yield('script')


</body>
</html>
