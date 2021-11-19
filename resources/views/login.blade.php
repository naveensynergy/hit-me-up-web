@extends('layouts.admin.master')
@section('title')
Sign In
@endsection
@section('content')
<style>
   .swal2-popup {
      font-size: 1.6rem !important;
      /* font-family: Georgia, serif; */
   }
   
</style>
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
   <div class="container">
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
                     @if(!empty(Session()->get('msg-error')))
                     <script>
                        Swal.fire({
                           icon: 'error',
                        title: '{{session()->get("msg-error")["title"]}}',
                        text: '{{session()->get("msg-error")["text"]}}',
                        })
                     </script>
                     @endif
                     @if(!empty(session()->get('msg-success')))
                     <script>
                        Swal.fire({
                           icon: 'success',
                        title: '{{session()->get("msg-success")["title"]}}',
                        text: '{{session()->get("msg-success")["text"]}}',
                        })
                     </script>
                     @endif
                     @if(session()->has('approved_error'))
                     <script>
                        Swal.fire({
                           icon: 'info',
                           title: 'Pending!',
                           text: 'Account not approved by admin yet. You will be notified through e-mail once done.',
                        })
                     </script>
                     @endif
                     <form action="{{url('/loginpost')}}" method="post">
                        @csrf
                        <br> 
                        Email: 
                        <input class="text email form-control" type="email" name="email" size="32" maxlength="64" placeholder="Enter Email" required>
                        <p></p>
                        <p>Password: <input class="text form-control" type="password" name="password" size="32" maxlength="32" placeholder="Enter Password" required="">
                        </p>
                        <p>
                           <input type="submit" value="SIGN IN">
                        </p>
                     </form>
                     <p><a href="#">Forgot Password?</a></p>
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
         // $('.alert').fadeIn(4000).delay(2000).fadeOut(2000);
      });
   </script>  
   @endsection
