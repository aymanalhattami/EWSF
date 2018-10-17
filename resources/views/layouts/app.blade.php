<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EWSF | Early Warning System for Floods</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/jquery-ui-1.12.1/jquery-ui.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{ asset('images/icon.PNG') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand nav-logo" href="{{ url('/') }}">
                        <img src="{{ url("../images/EWSF logo.png") }}" class="img-responsive" width="150" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}" class="nav-item-login"><i class="fa fa-sign-in"></i> Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-item-login" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                @if(auth()->user() != null)
                    <div class="col-md-2">
                    <div class="sidebar" id="sidebar">
                        <div class="sidebar-element @if($pageSubTitle == 'dashboard') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/') }}" class="color-black">
                                <span class="pull-left">Dashboard</span>
                                <i class="fa fa-dashboard pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="separator"></div>
                        <div class="sidebar-element @if($pageSubTitle == 'reports') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/reports') }}" class="color-black">
                                <span class="pull-left">Reports</span>
                                <i class="fa fa-file-pdf-o pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="sidebar-element @if($pageSubTitle == 'sensorsDetails') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/sensors-details') }}" class="color-black">
                                <span class="pull-left">Devices Status</span>
                                <i class="fa fa-line-chart pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="sidebar-element @if($pageSubTitle == 'weather') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/weather') }}" class="color-black">
                                <span class="pull-left">Weather</span>
                                <i class="fa fa-umbrella pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="sidebar-element @if($pageSubTitle == 'auditing') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/auditing') }}" class="color-black">
                                <span class="pull-left">Auditing</span>
                                <i class="fa fa-edit pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="sidebar-element @if($pageSubTitle == 'about') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/about') }}" class="color-black">
                                <span class="pull-left">About</span>
                                <i class="fa fa-info-circle pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="separator"></div>
                        @if (!empty(auth()->user()->admin) && (auth()->user()->admin != 0))
                        <div class="sidebar-element @if($pageSubTitle == 'userIndex' || $pageSubTitle == 'userEdit') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ url('/users') }}" class="color-black">
                                <span class="pull-left">Users</span>
                                <i class="fa fa-users pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        @endif
                        @if(!isset(auth()->user()->name))
                        <div class="sidebar-element @if($pageSubTitle == 'login') {{ 'sidebar-element-focus' }} @endif">
                            <a href="{{ route('login') }}" class="color-black">
                                <span class="pull-left">Login</span>
                                <i class="fa fa-sign-in pull-right main-color sidebar-fa"></i>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        @endif
                        @if (isset(auth()->user()->admin) && auth()->user()->admin != 0)
                            <div class="sidebar-element @if($pageSubTitle == 'register') {{ 'sidebar-element-focus' }} @endif">
                                <a href="{{ route('register') }}" class="color-black">
                                    <span class="pull-left">Add New User</span>
                                    <i class="fa fa-user-plus pull-right main-color sidebar-fa"></i>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        @endif
                        @if (!isset(auth()->user()->admin))
                            <div class="sidebar-element @if($pageSubTitle == 'register') {{ 'sidebar-element-focus' }} @endif">
                                <a href="{{ route('register') }}" class="color-black">
                                    <span class="pull-left">Register</span>
                                    <i class="fa fa-user-plus pull-right main-color"></i>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                @endif

                @if(auth()->user() == null)
                    <div class="col-md-12">
                        @include('include.messages')
                        @yield('content')
                    </div>
                @endif

                @if(auth()->user() != null)
                    <div class="col-md-10">
                        @include('include.messages')
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>

        @if(auth()->user() != null)
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <a href="{{ url('/') }}"><img src="{{ url("../images/EWSF logo.png") }}" class="img-responsive" width="100" /></a>
                        </div>
                        <div class="col-md-8 text-right">
                            <p>All right reserved to <a href="#">ewsf team</a> &copy; {{ date('Y') }} <i class="fa fa-thumbs-o-up"></i></p>
                        </div>
                    </div>
                </div>
            </footer>
        @endif
    </div>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <script src="{{ asset('js/jquery-3.0.1.min.js') }}"></script>
{{--    <script src="{{ asset('js/jquery-ui-1.12.1/jquery-ui.js') }}"></script>--}}
{{--    <script src="{{ asset('js/chartJS.js') }}"></script>--}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky-sidebar.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbQ11MN_JZXjU87IJtS2yRpA7kuDtyRmo&libraries=places" async defer></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
</body>
</html>
