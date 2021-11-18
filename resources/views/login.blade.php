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
                     @if(!empty(session()->has('msg-success')))
                     <script>
                        Swal.fire({
                           icon: 'success',
                        title: '{{session()->get("msg")["title"]}}',
                        text: '{{session()->get("msg")["text"]}}',
                        })
                     </script>
                     @endif
                     @if(!empty(session()->has('msg-error')))
                     <script>
                        Swal.fire({
                           icon: 'error',
                        title: '{{session()->get("msg")["title"]}}',
                        text: '{{session()->get("msg")["text"]}}',
                        })
                     </script>
                     @endif
                     @if(session()->has('success-register'))
                     <script>
                        Swal.fire(
                        'Registered!',
                        'Please verify your email to activate your account!',
                        'success'
                        )
                     </script>
                     @endif
                     @if(session()->has('success-verify'))
                     <script>
                        Swal.fire(
                        'Email Verified!',
                        'Your e-mail is verified, Account will be approved by admin. You will be notified through e-mail once done.',
                        'success'
                        )
                     </script>
                     @endif
                     @if(session()->has('verified'))
                     <script>
                        Swal.fire(
                        'Email Verified!',
                        'Your e-mail is already verified, You can now login.',
                        'success'
                        )
                     </script>
                     @endif
                     @if(session()->has('verifyemail_error'))
                     <script>
                        Swal.fire({
                           icon: 'error',
                           title: 'Email not Verified!',
                           text: 'We have sent you an e-mail. Please check your email and verify through e-mail to complete sign-up process.',
                        })
                     </script>
                     @endif
                     @if(session()->has('approved_error'))
                     <script>
                        Swal.fire({
                           icon: 'info',
                           title: 'Pending!',
                           text: 'Account not approved by admin. You will be notified through e-mail once done.',
                        })
                     </script>
                     @endif
                     <form action="{{url('/loginpost')}}" method="post">
                        @csrf
                        <br> 
                        Email: 
                        <input class="text email" type="email" name="email" size="32" maxlength="64" placeholder="Enter Email" required>
                        <p></p>
                        <p>Password: <input class="text" type="password" name="password" size="32" maxlength="32" placeholder="Enter Password" required="">
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