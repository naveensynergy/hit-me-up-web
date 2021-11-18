@extends('layouts\admin\master')
@section('title')
Business Signup
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Sign Up</h1>
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
                            @if(Session::has('error'))
								<div class="alert alert-danger">{{ Session::get('error') }}</div>
								@endif
								@if(Session::has('success'))
								<div class="alert alert-success">{{ Session::get('success') }}</div>
								@endif
								@if(Session::has('login-error'))
								<div class="alert alert-danger alert-dismissible fade show">
									{{ Session::get('login-error') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif
                            <form action="{{url('/business-signup-process')}}" method="post">
                                @csrf
                                <br> 
                                <p>Business Name: 
                                <input class="text" type="text" name="business_name" size="32" maxlength="64" placeholder="Enter Business Name" required>
                                </p>
                                <p>Email: 
                                <input class="text email" type="email" name="email" size="32" maxlength="64" placeholder="Enter Email" required>
                                </p>
                                <p>Mobile: 
                                <input class="text" type="text" name="mobile" size="32" maxlength="10" placeholder="Enter Mobile Number" required>
                                </p>
                                <p>Address: 
                                <input class="text" type="text" name="address" size="32" maxlength="64" placeholder="Enter Address" required>
                                </p>
                                <p>Password: <input class="text" type="password" name="password" size="32" maxlength="32" placeholder="Enter Password" required="">
                                </p>
                                <p>Product Categories:
                                    <select name="product_category" id="product_category">
                                        <option value="">Choose...</option>
                                        @if (!empty($categories))
                                        @foreach ($categories as $key => $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </p>
                                <p>
                                    <input type="submit" value="SIGN UP">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div> 
@endsection
@section('script')
{{--  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>  --}}
<script type="text/javascript">
    $(document).ready(function(){
	$('.alert').fadeIn(4000).delay(2000).fadeOut(2000);
});
</script>  
@endsection