<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | @yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto%3A300%2C400%2C500%2C700%7CRoboto+Slab%3A400%2C700&#038;subset=latin%2Clatin-ext&#038;ver=3.0.1" />
    <link href="{{asset('admin/assets/css/style.css?v=2.1.2')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/font-sizes.min.css?v=2.1.3')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/bootstrap.min.css?v=2.1.4')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/csshero-static-style-hestia.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/dashicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/css/public.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    </head>
<body class="page-template-default page page-id-4381 wp-custom-logo blog-post header-layout-default">
    <div class="wrapper  default ">
        <header class="header ">
            <div style="display: none"></div>
            <nav class="navbar navbar-default navbar-fixed-top hestia_left navbar-not-transparent">
                <div class="container">
                    <div class="navbar-header">
                        <div class="title-logo-wrapper">
                            <a class="navbar-brand" href="/"
                                title="hitmeuplocal get access to local discounts">
                                <img class="hestia-hide-if-transparent"
                                    src="http://www.hitmeuplocal.com/wp-content/uploads/2020/08/cropped-logo-150x100-1.png"
                                    alt="hitmeuplocal get access to local discounts"><img
                                    class="hestia-transparent-logo"
                                    src="http://www.hitmeuplocal.com/wp-content/uploads/2020/08/cropped-logo-150x100-1-1.png"
                                    alt="hitmeuplocal get access to local discounts"></a>
                        </div>
                        <div class="navbar-toggle-wrapper">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#main-navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="sr-only">Toggle Navigation</span>
                            </button>
                        </div>
                    </div>
                    <div id="main-navigation" class="collapse navbar-collapse">
                        <ul id="menu-main-menu" class="nav navbar-nav">
                            <li id="menu-item-4933"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4933"><a
                                    title="My Account" href="/admin/login"><i
                                        class="obfx-menu-icon dashicons dashicons-admin-users"></i>My Account</a></li>
                            <li id="menu-item-5027"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5027"><a
                                    title="Download" href="/"><i class="fas fa-tablet-alt"></i>Download</a></li>
                            <li id="menu-item-4639"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4639"><a
                                    title="Customer" href="http://127.0.0.1:8000/admin/customer"><i
                                        class="obfx-menu-icon fa fa-child"></i>Customer</a></li>
                            <li id="menu-item-4638"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638"><a
                                    title="Business" href="{{url('/business/list')}}"><i class="far fa-building"></i>Business</a></li>
                            <li id="menu-item-4747"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4747"><a
                                    title="FundRaisers" href="/"><i
                                        class="obfx-menu-icon dashicons dashicons-admin-site"></i>FundRaisers</a></li>
                            <li id="menu-item-4655"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4655"><a
                                    title="Search" href="/"><i
                                        class="obfx-menu-icon dashicons dashicons-search"></i>Search</a></li>
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
    <ul class="obfx-sharing
	obfx-sharing-left 	">
					<li class="">
				<a class="facebook" href="/">
					<i class="fab fa-facebook-f"></i>
					<span>Facebook</span>				</a>
			</li>
			</ul>
    {{-- *********************** --}}
    <script type='text/javascript' src='http://www.hitmeuplocal.com/wp-includes/js/jquery/jquery.min.js?ver=3.5.1' id='jquery-core-js'></script>
    <script src="{{asset('admin/assets/js/bootstrap.min.js')}}" rel="" ></script>
    {{-- <script src="{{asset('admin/assets/js/jquery.min.js?ver=3.5.1')}}" rel="" ></script> --}}
    <script src="{{asset('admin/assets/js/moment.js')}}" rel="" ></script>
    <script src="{{asset('admin/assets/js/public.js')}}" rel="" ></script>
    <script src="{{asset('admin/assets/js/script.min.js')}}" rel="" ></script>
    <script type='text/javascript' id='hestia_scripts-js-extra'>
/* <![CDATA[ */
    var requestpost = {"ajaxurl":"http:\/\/http://127.0.0.1:8000/admin\/admin-ajax.php","disable_autoslide":"","masonry":""};
/* ]]> */
     </script>

@yield('script')
</body>

</html>