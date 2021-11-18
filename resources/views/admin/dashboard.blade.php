@extends('layouts.admin.master')
@section('title')
Dashboard
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Admin Dashboard</h1>
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
                            {{--  <p id="fail"></p>
                            <script>
                                var myurl;
                                myurl = window.location.href;
                                if (myurl.search("fail=1") > -1) {
                                    document.getElementById("fail").innerHTML = "Incorrect Log In";
                                }
                            </script>  --}}
                            
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div> 
@endsection
@section('script')

@endsection