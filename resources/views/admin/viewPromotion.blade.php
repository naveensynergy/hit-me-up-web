@extends('layouts.admin.master')
@section('title')
Promotion Show
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Promotion Detail</h1>
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
                    <div class="col-md-12 text-right add-btn ">
                        <a href="/add-new-user-management" type="button" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp; Change Detail</a>
                        <a onclick="myFunction()"  type="button" class="btn btn-primary"><i class="fas fa-print"></i>&nbsp; Print</a>
                    </div>
                    <br/>
                    <div id="content-file" class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="row">Title</th>
                                    <th scope="row">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Title Name :</th>
                                    <td>{{$promotion->title}}</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Description :</th>
                                    <td>{{$promotion->description}}</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Discount Type :</th>
                                    <td>
                                        @if ($promotion->discount_type == 1)
                                            Flat
                                        @else
                                            Percentage
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Discount :</th>
                                    <td>{{$promotion->discount}}</td>
                                </tr>   
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