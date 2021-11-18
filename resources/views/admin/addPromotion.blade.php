@extends('layouts.admin.master')
@section('title')
Add Promotion
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Add New Promotion</h1>
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
                            <form method="post" action="{{url('admin/store-promotion')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">Select Business:</label>
                                        {{-- {{dd($business_list)}} --}}
                                        <select name="business" id="business" class="form-control">
                                            <option value="">Choose...</option>
                                            @if (count($business_list) > 0)
                                            @foreach ($business_list as $key => $business)
                                            <option value="{{$business->id}}">{{$business->name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @if($errors->has('business'))
                                        <div class="error" style="color:red;">{{ $errors->first('business') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="NameDemo">Title:</label>
                                        <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="Enter Title Name" name="title" value="{{old('title')}}">
                                        <small id="nameHelp" class="form-text text-muted">Please enter title name</small>
                                        @if($errors->has('title'))
                                        <div class="error" style="color:red;">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="passDemo">Discount Type:</label>
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Choose...</option>
                                            <option value="1">Flat</option>
                                            <option value="2">Percentage</option>
                                        </select>
                                        @if($errors->has('type'))
                                        <div class="error" style="color:red;">{{ $errors->first('type') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="NameDemo">Discount:</label>
                                        <input type="number" class="form-control" aria-describedby="nameHelp" placeholder="Enter Discount" name="discount" value="{{old('discount')}}">
                                        <small id="nameHelp" class="form-text text-muted">Please enter discount</small>
                                        @if($errors->has('discount'))
                                        <div class="error" style="color:red;">{{ $errors->first('discount') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="NameDemo">Description:</label>
                                        <textarea id="description" name="description" rows="4" cols="50" maxlength="200" class="form-control" placeholder="Write here....">
                                        </textarea>
                                        @if($errors->has('description'))
                                        <div class="error" style="color:red;">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="add-btn">
                                    <button type="submit" class="btn btn-success">Submit</button>
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
        
    </script>
    @endsection