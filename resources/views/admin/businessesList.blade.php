@extends('layouts.admin.master')
@section('title')
Businesses
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Businesses</h1>
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
                        <a href="{{url('admin/add-business')}}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>&nbsp; New Business</a>
                    </div>
                    <br />
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Business Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($businesses))
                                {{-- {{dd($businesses)}} --}}
                                @foreach ($businesses as $key => $business)
                                <tr>
                                    <td>{{$business->name}}</td>
                                    <td>{{$business->email}}</td>
                                    <td>{{$business->mobile}}</td>
                                    <td>{{getCategoryName($business->category_id)}}</td>
                                    <td>{{$business->address}}, {{$business->city}}, Pincode - {{$business->pincode}}, {{getStateName($business->state_id)}}, {{getCountryName($business->country_id)}}</td>
                                    <td>
                                        @if ($business->is_approved == 0)
                                            Pending
                                        @elseif ($business->is_approved == 1)
                                            Approved
                                        @else
                                            Rejected
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/business-view/'.$business->user_id)}}" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="{{url('admin/business-edit/'.$business->user_id)}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/business-delete/'.$business->user_id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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