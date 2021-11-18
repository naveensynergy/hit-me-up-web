@extends('layouts.admin.master')
@section('title')
Subscription Detail
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Subscription Detail</h1>
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
                        
                    </div>
                    <br/>
                    <div id="content-file" class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <h1>User Details</h1>
                            <thead>
                                <tr>
                                    <th scope="row">Title</th>
                                    <th scope="row">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name :</th>
                                    <td>{{@$user->name}}</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Email :</th>
                                    <td>{{@$user->email}}</td>
                                    
                                </tr>
                                <tr>
                                    <th scope="row">Mobile :</th>
                                    <td>
                                      {{ "+".@$user->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Address :</th>
                                    <td>{{@$user->address}}, {{ @$user->city }}, {{ @$user->state->name }}, {{ @$user->country->name }}, {{ @$user->pincode }}</td>
                                </tr>   
                            </tbody>
                        </table>
                    </div>
                    <br><br>

                    <div id="content-file" class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <h1>Subscription Details</h1>
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Expire Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (($subscriptions)->count() > 0)
                                @foreach ($subscriptions as $key => $subscription)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ @$subscription->sub_id->name ? $subscription->sub_id->name : "Trial Package"}}</td>
                                    <td>{{ @$subscription->sub_id->price ? $subscription->sub_id->price : "Free"}}</td>
                                    <td>{{ $subscription->starts_at }}</td>
                                    <td>{{ $subscription->expires_at }}</td>
                                 
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