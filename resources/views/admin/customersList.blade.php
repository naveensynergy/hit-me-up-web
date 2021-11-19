@extends('layouts.admin.master')
@section('title')
Customers
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Customers</h1>
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
                        <a href="{{url('admin/add-customer')}}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>&nbsp; New Customer</a>
                    </div>
                    <br />
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Email Verified</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($customers))
                                {{-- {{dd($customers)}} --}}
                                @foreach ($customers as $key => $customer)
                                <tr>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->address}}, {{$customer->city}}, Pincode - {{$customer->pincode}}, {{getStateName($customer->state_id)}}, {{getCountryName($customer->country_id)}}</td>
                                    <td>
                                        @if ($customer->is_email_verified == 0)
                                        No
                                        @elseif ($customer->is_email_verified == 1)
                                        Yes
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/customer-view/'.$customer->user_id)}}" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="{{url('admin/customer-edit/'.$customer->user_id)}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/customer-delete/'.$customer->user_id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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