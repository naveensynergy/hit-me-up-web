@extends('layouts\admin\master')
@section('title')
Business Owner List
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active"
style="transform: translate3d(0px, 0px, 0px);">
<div class="container" style="padding-top: 170px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <h1 class="hestia-title ">Customer Details</h1>
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
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($businesses))
                                @foreach ($businesses as $key => $business)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$business->name}}</td>
                                    <td>{{$business->email}}</td>
                                    <td>{{$business->mobile}}</td>
                                    <td>{{$business->address}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                        <button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align:center;">No Record Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </div>
    </div>
    @endsection
    @section('script')
    
    @endsection