{{-- resources/views/layouts/app.blade.php --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio site for Philip Parke">
    <meta name="author" content="Philip Parke">

    <title>Philip Parke | Backend Web Developer</title>

    <!-- CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- JS -->
  </head>

  <body>
    <div class="container">
      <!-- Navigation -->
      <a id="menu-toggle" href="#" class="btn btn-menu btn-lg toggle"><i class="fa fa-bars"></i></a>
      <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
          <a id="menu-close" href="#" class="btn btn-menu btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
          <li class="sidebar-brand">
            <a href="#top"  onclick = $("#menu-close").click(); >Menu</a>
          </li>
          <li>
            <a href="#top" onclick = $("#menu-close").click(); >Home</a>
          </li>
          <li>
            <a href="#about" onclick = $("#menu-close").click(); >About</a>
          </li>
          <li>
            <a href="#services" onclick = $("#menu-close").click(); >Services</a>
          </li>
          <li>
            <a href="#portfolio" onclick = $("#menu-close").click(); >Portfolio</a>
          </li>
          <li>
            <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
          </li>
          <!-- Authentication Links -->
          @if (Auth::guest())
            <li>
              <a href="{{ url('/login') }}">Login</a>
            </li>
            <li>
              <a href="{{ url('/register') }}">Register</a>
            </li>
          @else
            <li class="dropdown">
              <a href="{{ url('/profile') }}">
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
            </li>
            <li>
              <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
            </li>
          @endif
        </ul>
      </nav>
    </div>

    {{-- Content --}}
    @yield('content')

    {{-- Footer --}}
    <footer id="contact">
      <section class="footer-dark">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
              <div class="footer-title">
                Contact Me
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="footer-darker">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
              <ul class="list-unstyled">
                <li><i class="fa fa-envelope-o fa-fw"></i>  <a id="cmt" href="#"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section class="footer-darkest">
        <div class="container">
          <div class="row">
            <div class="col-lg-10 col-lg-offset-1 text-center">
             <ul class="list-inline">
               <li>
                 <a href="https://github.com/pparke"><i class="fa fa-github fa-fw fa-3x"></i></a>
               </li>
               <li>
                 <a href="https://twitter.com/parkenaut"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
               </li>
             </ul>
             <p class="text-muted">Copyright &copy; Philip Parke 2016</p>
           </div>
         </div>
       </div>
     </section>
    </footer>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

    <!-- Site JS -->
    <script src="/js/all.js"></script>

    <!-- Bootstrap JS -->
    <script src="/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function () {
        var m = "11001310121310220311000311022311010320113110113102123102203110003102203110113110113101213110203102223102023210131021131100131012131022031100031201310200311010311001";
        var e = "110113102123102203110003102203110113110113101213110203102223102023210131021131100131012131022031100031201310200311010311001";
        $('#cmt').attr('href', fromTrilobyte(m)).text(fromTrilobyte(e));
      });
    </script>
  </body>
</html>
