<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <link rel="icon" href="{{asset('asset/image/logo1.png')}}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="X -UA-Compatible" content="ie=edge">

  <title>Learning School </title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  

  <!-- Custom -->
  
  <link href="{{ asset('asset/bootstrap/css/customs.css')}}" rel="stylesheet">
   <link href="{{ asset('asset/bootstrap/css/rating.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('asset/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('asset/aos/dist/aos.css')}}">
   <link rel="stylesheet"  type="text/css" href="{{asset('asset/Magnifier/css/magnify.css')}}">

  <!-- CUSTOM CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('asset/css1/font.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('asset/css1/style.css')}}">
  <link rel="stylesheet" type="text/css" href=" {{asset('asset/css1/media_query.css')}}">

  <!-- BOOTSTRAP CSS -->
  {{--  <link rel="stylesheet" type="text/css" href="{{asset('asset/css1/bootstrap.min.css')}}">  --}}  

  <!-- OWL CAROUSEL -->
  <link rel="stylesheet" type="text/css" href=" {{asset('asset/css1/owl.carousel.css')}}">
  <link rel="stylesheet" type="text/css" href=" {{asset('asset/css1/owl.theme.default.css')}}">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg  navbar-light fixed-top bg-light" >
    <div class="container-fluid">
      <a class="navbar-brand learn_size" href="{{route('mainpage')}}" >
        <img src="{{asset('asset/image/logo1.png')}}" class="img-fluid w-75 ml-4" alt=""></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto snip1198">
        <li class="nav-item">
          <a class="nav-link " href="{{route('mainpage')}}" id="home">Home
          </a>
        </li>
         <li class="nav-item dropdown" >
         {{--    @foreach($categories as $category) --}}
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px; color: black;" >
         Courses
        </a>
        <div class="dropdown-menu fade-down" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-dark " href="{{route('grade1', 1)}} ">Grade 1</a><br>
           <a class="dropdown-item text-dark" href=" {{route('grade2', 2)}}">Grade 2</a><br>
            <a class="dropdown-item text-dark" href="{{route('grade3', 3)}}">Grade 3</a><br>
            <a class="dropdown-item text-dark" href="{{route('grade4', 4)}}">Grade 4</a><br>
            <a class="dropdown-item text-dark" href="{{route('grade5', 5)}}">Grade 5</a><br>
             <a class="dropdown-item text-dark" href="{{route('grade6', 6)}}">Grade 6</a><br>
             <a class="dropdown-item text-dark" href="{{route('grade7', 7)}}">Grade 7</a><br>
             <a class="dropdown-item text-dark" href="{{route('grade8', 8)}}">Grade 8</a><br>
             <a class="dropdown-item text-dark" href="{{route('grade9', 9)}}">Grade 9</a>
          
        </div>
        {{--  @endforeach --}}
      </li>

          
           <li class="nav-item ">
          <a class="nav-link" href="{{route('onlinecoursepage')}}" id="online">Online Courses
          </a>
        </li>
         <li class="nav-item ">
            <a class="nav-link" href="{{route('aboutuspage')}}"  id="contact">About</a>
          </li>
             <li class="nav-item ">
            <a class="nav-link" href="{{route('contactpage')}}"  id="contact">Contact</a>
          </li>
          @auth
            <li class="nav-item dropdown ">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 22px; color: black;">
                  {{ Auth::user()->name }}
                  </a>

                 <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown" >
                   <a href="{{route('profilepage')}}" style="font-size: 16px; color: black; width: 150px;">Profile</a><br>
                   {{--  <a href="{{route('registerdetail')}}" style="font-size: 16px; color: black;">Register Detail</a><br> --}}

                 <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" style="font-size: 16px; color: black;">  Logout
                        </a>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
              </div>
           </li>
           @else
            <li class="nav-item ">
            <a class="nav-link" href="{{route('signinpage')}}" id="signin">Sign in</a>
          </li>
          @endauth
        </ul>
        <div class="row mt-3 ml-2">
        <div id="google_translate_element" class="google"></div>
        </div>
      </div>
    </div> 
  </nav>
 <!-- Navigation end -->


  <!-- Page Content -->
  @yield('content')
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5" style="background: #001C2D  ">
    <div class="container">
      <p class="m-0 text-center text-white">copy right&copy;  2020 Learning School.</p>
    
    </div>
    <!-- /.container -->
  </footer>
 {{--   <button id="topBtn"><i class="fas fa-sort-up rounded-circle my-2"></i></button> --}}

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('asset/bootstrap/js/jquery.min.js')}}"></script>
  <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{ asset('asset/aos/dist/aos.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
  <script type="text/javascript" src="{{asset('asset/js1/custom.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Owl Carousel -->
  <script type="text/javascript" src="{{asset('asset/js1/owl.carousel.js')}}"></script>
 {{--  <script type="text/javascript" src="{{asset('asset/parallax/parallax.min.js')}}"></script> --}}
  <script type="text/javascript" src="{{asset('asset/Magnifier/js/jquery.magnify.js')}}"></script>



  {{-- <script >
    $(document).ready(function(){
      $("#topBtn").hide();
      $(window).scroll(function(){
        if($(this).scrollTop()>40) {
          $('#topBtn').fadeIn();

        }else{
          $('#topBtn').fadeOut();
        }
      });

      $("#topBtn").click(function(){
        $('html, body').animate({scrollTop:0},300);
      });
    });
  </script> --}}
  
  <script>
      AOS.init({
        duration:2000,
        once: true,
      });
    </script>
    <script type="text/javascript">
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('a');
    const menuLength = menuItem.length
      for(let i=0; i<menuLength; i++){
        if (menuItem[i].href === currentLocation) {
          menuItem[i].className = "active"
        }
      }
  </script>
  <script type="text/javascript">
  function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}


// Minified Scripts
(function(){var gtConstEvalStartTime = new Date();/*

 Copyright The Closure Library Authors.
 SPDX-License-Identifier: Apache-2.0
*/
function d(b){var a=document.getElementsByTagName("head")[0];a||(a=document.body.parentNode.appendChild(document.createElement("head")));a.appendChild(b)}function _loadJs(b){var a=document.createElement("script");a.type="text/javascript";a.charset="UTF-8";a.src=b;d(a)}function _loadCss(b){var a=document.createElement("link");a.type="text/css";a.rel="stylesheet";a.charset="UTF-8";a.href=b;d(a)}function _isNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)if(!(a=a[b[c]]))return!1;return!0}
function _setupNS(b){b=b.split(".");for(var a=window,c=0;c<b.length;++c)a.hasOwnProperty?a.hasOwnProperty(b[c])?a=a[b[c]]:a=a[b[c]]={}:a=a[b[c]]||(a[b[c]]={});return a}window.addEventListener&&"undefined"==typeof document.readyState&&window.addEventListener("DOMContentLoaded",function(){document.readyState="complete"},!1);
if (_isNS('google.translate.Element')){return}(function(){var c=_setupNS('google.translate._const');c._cest = gtConstEvalStartTime;gtConstEvalStartTime = undefined;c._cl='en';c._cuc='googleTranslateElementInit';c._cac='';c._cam='';c._ctkk='440335.1449305758';var h='translate.googleapis.com';var s=(true?'https':window.location.protocol=='https:'?'https':'http')+'://';var b=s+h;c._pah=h;c._pas=s;c._pbi=b+'/translate_static/img/te_bk.gif';c._pci=b+'/translate_static/img/te_ctrl3.gif';c._pli=b+'/translate_static/img/loading.gif';c._plla=h+'/translate_a/l';c._pmi=b+'/translate_static/img/mini_google.png';c._ps=b+'/translate_static/css/translateelement.css';c._puh='translate.google.com';_loadCss(c._ps);_loadJs(b+'/translate_static/js/element/main.js');})();})();
</script>
  @yield('script')
</body>

</html>