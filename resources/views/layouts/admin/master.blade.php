<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    
    <link href="{{asset('admin/assets/css/style.css?v=2.1.2')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/bootstrap.min.css?v=2.1.4')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/csshero-static-style-hestia.css')}}" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Dropdown */
        li.dropdown {
            position: relative;
        }
        
        ul.dropdown-menu {
            position: absolute;
            min-width: 150px;
        }
        
        ul.dropdown-menu li {
            display: block !important;
            white-space: nowrap;
        }
        
        /* Sub Dropdown */
        ul.dropdown-menu ul.dropdown-menu {
            left: 100%;
            top: 0;
        }
        
        /* Display none by Default */
        ul.dropdown-menu {
            display: none;
        }
    </style>
    <style> 
        input.form-control {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          box-sizing: border-box;
          border-bottom: 3px solid #d5d5d5;
          -webkit-transition: 0.5s;
          transition: 0.5s;
          outline: none;
          border-top:0px;
          border-left:0px;
          border-right:0px;
        }
        
        input.form-control:focus {
          border: 3px solid green;
          border-top:0px;
          border-left:0px;
          border-right:0px;
        }
        </style>
    <script>
        $(function() {
            
            $('.nav li').hover(function() {
                $(this).find('ul').first().stop().toggle(200);
            }, function() {
                $(this).find('ul').stop().hide(200);
            });
            
            
        });
    </script>
</head>

<body class="page-template-default page page-id-4381 wp-custom-logo blog-post header-layout-default">
    <div class="wrapper  default ">
        <header class="header ">
            <div style="display: none"></div>
            <nav class="navbar navbar-default navbar-fixed-top hestia_left navbar-not-transparent">
                <div class="container">
                    <div class="navbar-header">
                        <div class="title-logo-wrapper">
                            <a class="navbar-brand" href="{{ url('/login', []) }}" title="hitmeuplocal get access to local discounts">
                                <img class="hestia-hide-if-transparent" src="http://www.hitmeuplocal.com/wp-content/uploads/2020/08/cropped-logo-150x100-1.png" alt="hitmeuplocal get access to local discounts"><img class="hestia-transparent-logo" src="http://www.hitmeuplocal.com/wp-content/uploads/2020/08/cropped-logo-150x100-1-1.png" alt="hitmeuplocal get access to local discounts"></a>
                            </div>
                            <div class="navbar-toggle-wrapper">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="sr-only">Toggle Navigation</span>
                                </button>
                            </div>
                        </div>
                        <div id="main-navigation" class="collapse navbar-collapse navbarCollapse">
                            <ul id="menu-main-menu" class="nav navbar-nav">
                                @if (Request::path() != 'login')
                                @if (Auth::check() && Auth::user()->role_id == 1)
                                
                                
                                
                                <li id="menu-item-4638" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638 dropdown " style="z-index:99999 !important;">
                                    <a title="Business" href="javascript:void()"><i class="far fa-building"></i>Business Management
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('admin/businesses')}}">Businesses</a></li>
                                        <li><a href="{{url('admin/categories')}}">Categories</a></li>
                                        <li><a href="{{url('admin/promotions')}}">Promotions</a></li>
                                        {{-- <li class="dropdown"><a href="#">Sub Item 3 <span>&diams;</span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">More Sub Item 1</a></li>
                                                <li class="dropdown"><a href="#">More Sub Item 2 <span>&diams;</span></a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Other Sub Item 1</a></li>
                                                        <li><a href="#">Other Sub Item 2</a></li>
                                                        <li><a href="#">Other Sub Item 3</a></li>
                                                        <li><a href="#">Other Sub Item 4</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">More Sub Item 3</a></li>
                                                <li><a href="#">More Sub Item 4</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Sub Item 4</a></li> --}}
                                    </ul>
                                </li>
                                
                                <li id="menu-item-4638" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638 dropdown " style="z-index:99999 !important;">
                                    <a title="Business" href="javascript:void()"><i class="fa fa-users"></i>Customer Management
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('admin/customers')}}">Customers</a></li>
                                        <li><a href="{{url('admin/subscriptions')}}">Subscriptions</a></li>
                                    </ul>
                                </li>
                                
                                <li id="menu-item-4638" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638 dropdown " style="z-index:99999 !important;">
                                    <a title="Business" href="javascript:void()"><i class=" fa fa-user"></i>{{Auth::user()->name}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('admin/businesses')}}">My Account</a></li>
                                        <li><a title="Download" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    </ul>
                                </li>
                                
                                
                                
                                
                                
                                @elseif (Auth::check() && Auth::user()->role_id == 2)
                                
                                <li id="menu-item-4933" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4933"><a title="My Account" href="/admin/login"><i class="obfx-menu-icon dashicons dashicons-admin-users"></i>{{Auth::user()->name}}</a></li>
                                <li id="menu-item-4638" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638 dropdown ">
                                    <a title="Business" href="#;"><i class="far fa-building"></i>Promotion Management
                                        <span>&diams;</span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('business/promotions')}}">Promotions</a></li>
                                        </ul>
                                    </li>
                                    <li id="menu-item-5027" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5027"><a title="Download" href="{{url('/logout')}}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                                    @endif
                                    @else
                                    <li id="menu-item-4933" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4933"><a title="My Account" href="{{url('/signup')}}"><i class="obfx-menu-icon dashicons dashicons-admin-users"></i>Sign Up</a></li>
                                    
                                    @endif
                                    
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                
                @yield('content')
                
                <footer class="footer footer-black footer-big">
                    <div class="container">
                        <div class="hestia-bottom-footer-content">
                            <div class="copyright pull-right">
                                <a href="mailto:youremailaddress">contact us | </a>
                                
                                <a href="/"> about hitmeuplocal</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}" rel=""></script>
        @yield('script')
    </body>
    </html>