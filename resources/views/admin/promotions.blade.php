@extends('layouts.admin.master')
@section('title')
Promotions
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Promotions</h1>
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
                        <a href="{{url('admin/add-promotion')}}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>&nbsp; New Promotion</a>
                    </div>
                    <br />
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Discount Type</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Business Name</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($promotions))
                                @foreach ($promotions as $key => $promotion)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$promotion->title}}</td>
                                    <td>{{$promotion->description}}</td>
                                    <td>
                                        @if ($promotion->discount_type == 1)
                                        Flat
                                        @else
                                        Percentage
                                        @endif
                                    </td>
                                    <td>{{$promotion->discount}}</td>
                                    <td>{{getUserName($promotion->business_id)}}</td>
                                    <td class="text-center">
                                        <a href="{{url('admin/view-promotion/'.$promotion->id)}}" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="{{url('admin/edit-promotion/'.$promotion->id)}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/delete-promotion/'.$promotion->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>No Record!</td>
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