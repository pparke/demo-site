{{-- views/components/nav --}}

<a id="menu-toggle" href="#" class="btn btn-menu btn-lg toggle"><i class="fa fa-bars"></i></a>
<nav id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <a id="menu-close" href="#" class="btn btn-menu btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
    <li class="sidebar-brand">
      <a href="#top"  onclick = $("#menu-close").click(); >Menu</a>
    </li>
    @foreach($items as $name => $href)
    <li>
      <a href="{{ $href }}" onclick = $("#menu-close").click(); >{{ $name }}</a>
    </li>
    @endforeach
    <!-- Authentication Links -->
    @if (Auth::guest())
      <li>
        <a href="{{ url('/login') }}">Login</a>
      </li>
      <li>
        <a href="{{ url('/register') }}">Register</a>
      </li>
    @else
      <li>
        <a href="{{ url('/profile') }}">
          {{ Auth::user()->username }}
        </a>
      </li>
      <li>
        <a href="{{ url('/logout') }}">Logout</a>
      </li>
    @endif
  </ul>
</nav>
</div>
