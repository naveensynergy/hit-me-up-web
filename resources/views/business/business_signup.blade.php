@extends('layouts.admin.master')
@section('title')
Add Business
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Add New Business</h1>
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
                    <div class="col-md-12  add-btn ">
                        <div class="container">
                            <form method="post" action="{{url('/store-business')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="NameDemo">Business Name:</label>
                                        <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="Enter Business Name" name="business_name" value="{{old('business_name')}}">
                                        {{-- <small id="nameHelp" class="form-text text-muted">Please enter your business name</small> --}}
                                        @if($errors->has('business_name'))
                                        <div class="error" style="color:red;">{{ $errors->first('business_name') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="EmailDemo">Email:</label>
                                        <input type="email" class="form-control" id="EmailDemo" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
                                        {{-- <small id="emailHelp" class="form-text text-muted">Please enter your primary email, we will send confirmation email!</small> --}}
                                        @if($errors->has('email'))
                                        <div class="error" style="color:red;">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label for="PhoneDemo">Mobile:</label>
                                        <select name="phonecode" id="phonecode" class="form-control">
                                            <option value="">Choose...</option>
                                            @if (!empty($phonecodes))
                                            @foreach ($phonecodes as $key => $phonecode)
                                            <option value="{{$phonecode->phonecode}}" {{ $phonecode->phonecode == '1' ? "selected" : "" }}>+{{$phonecode->phonecode}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('phonecode'))
                                        <div class="error" style="color:red;">{{ $errors->first('phonecode') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="PhoneDemo">‎</label>
                                        <input type="number" class="form-control" id="mobile" aria-describedby="phonelHelp" placeholder="Enter Mobile Number" name="mobile" value="{{old('mobile')}}">
                                        {{-- <small id="phoneHelp" class="form-text text-muted">Please enter your primary phone, we will send confirmation phone!</small> --}}
                                        @if($errors->has('mobile'))
                                        <div class="error" style="color:red;">{{ $errors->first('mobile') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">Password:</label>
                                        <input type="password" class="form-control" id="password" aria-describedby="passHelp" placeholder="Enter Password" name="password" value="{{old('password')}}">
                                        {{-- <small id="password" class="form-text text-muted">Must be 8 characters long</small> --}}
                                        @if($errors->has('password'))
                                        <div class="error" style="color:red;">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">Address:</label>
                                        <input type="text" class="form-control" id="address" aria-describedby="addressHelp" placeholder="House/Building/Street" name="address" value="{{old('address')}}">
                                        {{-- <small id="addressHelp" class="form-text text-muted">Please Enter Complete Address</small> --}}
                                        @if($errors->has('address'))
                                        <div class="error" style="color:red;">{{ $errors->first('address') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">City:</label>
                                        <input type="text" class="form-control" id="city" aria-describedby="cityHelp" placeholder="Enter City" name="city" value="{{old('city')}}">
                                        {{-- <small id="cityHelp" class="form-text text-muted">Please Enter the City.</small> --}}
                                        @if($errors->has('city'))
                                        <div class="error" style="color:red;">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">Pin/Zip:</label>
                                        <input type="text" class="form-control" id="pincode" aria-describedby="pinHelp" placeholder="Enter Pin/zip code" name="pincode" value="{{old('pincode')}}">
                                        {{-- <small id="pincode" class="form-text text-muted">Please Enter the Pin/Zip.</small> --}}
                                        @if($errors->has('pincode'))
                                        <div class="error" style="color:red;">{{ $errors->first('pincode') }}</div>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="">Country:</label>
                                        <select name="country_id" id="country_id" class="form-control">
                                            <option value="">Choose...</option>
                                            @if (!empty($countries))
                                            @foreach ($countries as $key => $country)
                                            <option value="{{$country->id}}" {{ old('country_id') == $country->id ? "selected" : "" }}>{{$country->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('country_id'))
                                        <div class="error" style="color:red;">{{ $errors->first('country_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">State:</label>
                                        <select name="state_id" id="state_id" class="form-control">
                                            <option value="">Choose...</option>
                                            <!-- @if (!empty($states))
                                                @foreach ($states as $key => $state)
                                                <option value="{{$state->id}}" {{ old('state_id') == $state->id ? "selected" : "" }}>{{$state->name}}</option>
                                                @endforeach
                                                @endif -->
                                            </select>
                                            @if($errors->has('state_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('state_id') }}</div>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label for="passDemo">Category:</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Choose...</option>
                                                @if (!empty($categories))
                                                @foreach ($categories as $key => $category)
                                                <option value="{{$category->id}}" {{ old('category_id') == $category->id ? "selected" : "" }}>{{$category->category_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('category_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('category_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6" id="add_subcat">
                                            <label for="passDemo">Sub-Category:</label>
                                            <select name="subcat_id" id="subcat_id" class="form-control">
                                                
                                            </select>
                                            @if($errors->has('subcat_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('subcat_id') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-btn">
                                        <button type="submit" class="btn btn-success">Create Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        @endsection
        @section('script')
        <script>
            $("#country_id").on('change', function(){
                var country_id = $('#country_id option:selected').val();
                var url = '{{url("admin/get-states")}}';
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        country_id: country_id,
                        _token: _token
                    },
                    success: function(response) {
                        console.log(response);
                        $("#state_id").html(response);
                        return false;
                    }
                });
            });
            
            // get catogories by category id
            $('#add_subcat').hide();
            $("#category_id").on('change', function(){
                var category_id = $('#category_id').val();
                var url = '{{url("admin/get-categories")}}';
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        category_id: category_id,
                        _token: _token
                    },
                    success: function(response) {
                        console.log(response);
                        if (response != 'false') {
                            $('#add_subcat').show();
                            $("#subcat_id").html(response);
                            return false;
                        } else {
                            $('#add_subcat').hide();
                        }
                        // $("#state_id").html(response);
                        return false;
                    }
                });
            });
        </script>
        @endsection