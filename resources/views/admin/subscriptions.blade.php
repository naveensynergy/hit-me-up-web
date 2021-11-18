@extends('layouts.admin.master')
@section('title')
Subscriptions
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Subscriptions</h1>
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
                        {{-- <a href="{{url('admin/add-promotion')}}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>&nbsp; New Promotion</a> --}}
                    </div>
                    <br />
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <form action="" method="get">
                                    <label for="passDemo">Select Package:</label>
                                    <select name="sub_id" id="sub_id" class="form-control">
                                        <option value="">Choose...</option>
                                        <option value="0" {{ @$_GET['sub_id'] == 0 ? 'selected' : ''}}>Trial Package</option>
                                        @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ @$_GET['sub_id'] == $package->id ? 'selected' : ''}}>{{ $package->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="NameDemo">Customer Name:</label>
                                    <input type="text" class="form-control" style="margin:0" aria-describedby="nameHelp" placeholder="Enter Customer Name or Number" name="search" value="{{ @$_GET['search'] != "" ? @$_GET['search']  : ''}}">
                                </div>
                                
                                <button class="btn btn-primary" style="margin-top: 20px" type="submit">Submit</button>
                                <a type="button" class="btn btn-warning" href="{{ url('admin/subscriptions')}}"style="margin-top: 20px">Reset</a>
                            </form>
                        </div>
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Package</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">Expire Date</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (($subscriptions)->count() > 0)
                                @foreach ($subscriptions as $key => $subscription)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ Ucfirst($subscription->user_id->name) }}</td>
                                    <td>{{ @$subscription->sub_id->name ? $subscription->sub_id->name : "Trial Package"}}</td>
                                    <td>{{ @$subscription->sub_id->price ? $subscription->sub_id->price : "Free"}}</td>
                                    <td>{{ $subscription->starts_at }}</td>
                                    <td>{{ $subscription->expires_at }}</td>
                                    <td class="text-center">
                                        <a href="{{url('admin/view-subscription/'.$subscription->user_id->id)}}" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="text-center">
                                    <td colspan="7">-------------------------- No Record! ------------------------</td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                        <div class="text-right">
                            {{ $subscriptions->appends($_GET)->links() }}
                            <br>
                        </div>
                        
                        
                    </div>
                </div>
            </article>
        </div>
    </div>
    @endsection
    @section('script')
    
    @endsection