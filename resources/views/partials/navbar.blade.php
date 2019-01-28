    <!-- Upper Nav -->
    <div class="upper">
        <ul>
            <li><a class="nav-link" href="\">{{_('Home')}}</a></li>
            <li>Categories</li>
            <li><a href="/my-account">MyAccount</a></li>
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            @else
                <li>
                <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>
                <li>FAQ</li>    
            @endguest
        </ul>
    </div>
    <!-- Lower Nav -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
              <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
              </a>
          
              <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
              </a>
            </div>
          
            <div id="mainNav" class="navbar-menu">
          
              <div class="navbar-end">
                <div class="navbar-item">
                    <input type="text" placeholder="Search here">
                    <button class="button" value="search">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
              </div>
            </div>
          </nav>