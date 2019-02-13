    <!-- Upper Nav -->
    <div class="upper">
        <ul>
            <li><a class="nav-link" href="\">{{_('Home')}}</a></li>
            <li><a class="nav-ling" href="{{url('categories')}}">Categories</a></li>
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
              <a class="navbar-item" href="http://127.0.0.1:8000/">
                <p class="logo-text">BiD'o</p>
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
                    <form action="{{url('/search')}}" method="GET" id="search-form">
                    @csrf
                        <input name="keyword" type="text" placeholder="Search here">
                        <button class="button" type="submit" form="search-form" value="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                
                <!-- Notification -->
                <div class="notification-container">
                
                    <div class="dropdown" style="float: right; padding: 13px">
                            <div class="dropdown-trigger">
                                <a href="#" onclick="return false;" role="button" data-toggle="dropdown" id="dropdownMenu1" data-target="#" style="float: left" aria-expanded="true">
                                    <i class="fa fa-bell-o" style="font-size: 20px; float: left; color: black">
                                    </i>
                                </a>
                                <span class="badge badge-danger">6</span>
                            </div>
                            <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                <ul class="dropdown-content-content" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a href="#" class="dropdown-menu-header">Notifications</a>
        </li>
        <ul class="timeline timeline-icons timeline-sm" style="margin:10px;width:210px">
                                        <li>
                                            <p>
                                                <a>    
                                                Your bid for “Samsung Galaxy S7” was sucessfull! 
                                                <span class="timeline-icon"><i class="fa fa-file-pdf-o" style="color:red"></i></span>
                                                <span class="timeline-date">Dec 10, 22:00</span>
                                                </a>
                                            </p>
                                        </li>
                                        <!-- <li>
                                            <p>
                                                Your “Marketplace Report” PDF is ready <a href="">here</a>
                                                <span class="timeline-icon"><i class="fa fa-file-pdf-o"  style="color:red"></i></span>
                                                <span class="timeline-date">Dec 6, 10:17</span>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                Your “Top Words” spreadsheet is ready <a href="">here</a>
                                                <span class="timeline-icon"><i class="fa fa-file-excel-o"  style="color:green"></i></span>
                                                <span class="timeline-date">Dec 5, 04:36</span>
                                            </p>
                                        </li> -->
                                    </ul>
        <li role="presentation">
            <a href="#" class="dropdown-menu-header"></a>
        </li>
    </ul>
                            </div>
                            
            
                    </div>
              
              </div>
               </div>
            </div>
          </nav>