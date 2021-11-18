@extends('admin.layouts')
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active"
    style="transform: translate3d(0px, 0px, 0px);">
    <div class="container" style="padding-top: 170px;">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Sign In</h1>
            </div>
        </div>
    </div>
    <div class="header-filter header-filter-gradient"></div>
</div>
<div class="main  main-raised ">
    <div class="blog-post ">
        <div class="container">


            <article id="post-4381" class="section section-text">
                <div class="row">
                    <div class="col-md-8 page-content-wrap  col-md-offset-2">


                        <div class="" style="margin-bottom: 50px;">
                            <p id="fail"></p>
                            <script>
                                var myurl;
                                myurl = window.location.href;
                                if (myurl.search("fail=1") > -1) {
                                    document.getElementById("fail").innerHTML = "Incorrect LogIn";
                                }
                            </script>
                            <form action="#" name="signin" method="post"
                                class="form-group">
                                <input class="text" type="hidden" name="action" value="S"><br>
                                Email: <input class="text email form-control" type="email" name="email" size="32"
                                    maxlength="64" placeholder="" required="">
                                <p></p>
                                <p class="form-group">Password: <input class="text form-control" type="password"
                                        name="pwd" size="32" maxlength="32" placeholder="" required=""></p>
                                <p><input type="submit" value="SIGN IN"></p>
                            </form>
                            <p><a href="hitmeuplocal.com/forgot-password">Forgot Password?</a></p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <footer class="footer footer-black footer-big">
        <div class="container">
            <div class="hestia-bottom-footer-content">
                <div class="copyright pull-right">
                    <a href="mailto:youremailaddress">contact us | </a>

                    <a href="#"> about hitmeuplocal</a>
                </div>
            </div>
        </div>
    </footer>
</div>


@endsection