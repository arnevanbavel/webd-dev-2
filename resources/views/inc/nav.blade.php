<div class="top">
                <ul class="clearfix">
                    <li class="nav-normal">
                        <a class="toggle-nav"><img src="{{ url('/img/menu/hamburgerIcon.png') }}"></a>
                    </li>             
                    <li class="nav-normal {{ (Request::is('search') ? 'active-search' : '') }}">
                        <a class="nav-search" href="{{ url('/search') }}">
                            <img src="{{ url('/img/menu/searchIcon.png') }}"><strong class="nav-text">Search</strong>
                        </a>
                    </li>
                    <li class="nav-normal {{ (Request::is('FAQ') ? 'active-FAQ' : '') }}">
                        <a class="nav-FAQ" href="{{ url('/FAQ') }}">
                            <img src="{{ url('/img/menu/FAQ.png') }}"><strong class="nav-text">FAQ</strong>
                        </a>
                    </li>
                </ul>
                <div class="horizontal-divider"></div>
                <ul class="clearfix">
                    <li class="nav-normal">
                        <a href="{{ url('categories/dog') }}">
                            <img class="category-icon" src="@if(Request::is('../dog/..')) {{ url('/img/menu/dog.png') }} @else {{ url('/img/menu/white_dog.png') }} @endif">
                            <strong class="nav-text">Dog</strong>
                        </a>
                    </li>
                    <li class="nav-normal">
                        <a href="{{ url('categories/cat') }}">
                            <img class="category-icon" src="@if(Request::is('categories/cat')) {{ url('/img/menu/cat.png') }} @else {{ url('/img/menu/white_cat.png') }} @endif">
                            <strong class="nav-text">Cat</strong>
                        </a>
                    </li>
                    <li class="nav-normal">
                        <a href="{{ url('categories/bird') }}">
                            <img class="category-icon" src="@if(Request::is('categories/bird')) {{ url('/img/menu/bird.png') }} @else {{ url('/img/menu/white_bird.png') }} @endif">
                            <strong class="nav-text">Bird</strong>
                        </a>
                    </li>
                    <li class="nav-normal">
                        <a href="{{ url('categories/fish') }}">
                            <img class="category-icon" src="@if(Request::is('categories/fish')) {{ url('/img/menu/fish.png') }} @else {{ url('/img/menu/white_fish.png') }} @endif">
                            <strong class="nav-text">Fish</strong>
                        </a>
                    </li>
                    <li class="nav-normal">
                        <a href="{{ url('categories/smallanimals') }}">
                            <img class="category-icon" src="@if(Request::is('categories/smallanimals')) {{ url('/img/menu/hamster.png') }} @else {{ url('/img/menu/white_hamster.png') }} @endif">
                            <strong class="nav-text">Small animals</strong>
                        </a>
                    </li>
                    <li class="nav-normal {{ (Request::is('categories/other') ? 'active-other' : '') }}">
                        <a href="{{ url('categories/other') }}">
                            <img class="category-other" src="{{ url('/img/menu/other.png') }}">
                            <strong class="nav-text">Other</strong>
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="bottom">
                @if(Auth::check() && Auth::user()->isAdmin())
                    <li class="nav-normal">
                        <a href="{{ url('admindashboard') }}">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                            <strong class="nav-text">Dashboard</strong>
                        </a>
                    </li>
                    <li class="nav-normal">
                        <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span><strong class="nav-text">Logout</strong>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                        </form>
                    </li>
                @endif
                <li class="nav-normal">
                    <a href="{{ url('/language?lang=nl') }}">
                        <strong class="language">NL</strong>
                        <strong class="nav-text">Nederlands</strong>
                    </a>
                </li>
                <li class="nav-normal">
                    <a href="{{ url('/language?lang=en') }}">
                        <strong class="language">EN</strong>
                        <strong class="nav-text">English</strong>
                    </a>
                </li>
                <li class="nav-normal">
                    <a href="{{ url('/about') }}">
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        <strong class="nav-text">About us</strong>
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}">
                        <img class="logo-k" src="{{ url('/img/menu/K.png') }}">
                        <img class="logo-kowloon" src="{{ url('/img/menu/Kowloon.png') }}">
                    </a>
                </li>
            </ul>