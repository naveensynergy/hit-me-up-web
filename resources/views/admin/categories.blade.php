@extends('layouts.admin.master')
@section('title')
Businesses
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Categories</h1>
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
                        <a href="{{url('admin/add-category')}}" type="button" class="btn btn-primary"><i class="far fa-plus"></i>&nbsp; New Category</a>
                    </div>
                    <br />
                    <div class="col-md-12 page-content-wrap table-responsive ">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Parent Category</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($categories))
                                {{-- {{dd($businesses)}} --}}
                                @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>
                                    @if ($category->parent_id == 0)
                                         - 
                                    @else
                                        {{getCategoryName($category->parent_id)}}
                                    @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/view-category/'.$category->id)}}" type="button" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <a href="{{url('admin/edit-category/'.$category->id)}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="{{url('admin/delete-category/'.$category->id)}}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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