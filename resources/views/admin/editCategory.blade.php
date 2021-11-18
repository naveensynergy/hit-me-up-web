@extends('layouts.admin.master')
@section('title')
Add Business
@endsection
@section('content')
<div id="primary" class="boxed-layout-header page-header header-small" data-parallax="active">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="hestia-title ">Add New Category</h1>
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
                            <form method="post" action="{{url('admin/update-category/'.$category_data->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <fieldset>
                                            <div class="form-group col-md-3">
                                                <input type="radio" name="category" id="event" value="0" {{ ($category_data->parent_id == "0")? "checked" : "" }}>
                                                <label style="margin-left: 6px;" for="event">Add Category</label>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="radio" name="category" id="message" value="1" {{ ($category_data->parent_id != "0")? "checked" : "" }}>
                                                <label for="message" style="margin-left: 6px;">Add Sub-Category</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6" id="cat_list_div">
                                        <label for="passDemo">Category:</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Choose...</option>
                                            @if (!empty($categories))
                                            @foreach ($categories as $key => $category)
                                            <option value="{{$category->id}}" 
                                                {{ old('category_id') == $category->id ? "selected" : ($category_data->parent_id == $category->id ? "selected" : "")}}>{{$category->category_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('category_id'))
                                            <div class="error" style="color:red;">{{ $errors->first('category_id') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6"  id="cat_name_div">
                                            <label for="NameDemo">Category Name:</label>
                                            <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="Enter Category Name" name="category_name" @if (!empty($category_data) && $category_data->parent_id == '0')
                                            value="{{$category_data->category_name}}"
                                            @else
                                            value="{{old('category_name')}}"
                                            @endif>
                                            <small id="nameHelp" class="form-text text-muted">Please enter category name</small>
                                            @if($errors->has('category_name'))
                                            <div class="error" style="color:red;">{{ $errors->first('category_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6" id="sub_cat_div">
                                            <label for="NameDemo">Sub-Category Name:</label>
                                            <input type="text" class="form-control" aria-describedby="nameHelp" placeholder="Enter Sub-Category Name" name="sub_cat_name" @if (!empty($category_data) && $category_data->parent_id != '0')
                                            value="{{$category_data->category_name}}"
                                            @else
                                            value="{{old('sub_cat_name')}}"
                                            @endif>
                                            <small id="nameHelp" class="form-text text-muted">Please enter sub-category name</small>
                                            @if($errors->has('sub_cat_name'))
                                            <div class="error" style="color:red;">{{ $errors->first('sub_cat_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- {{dd($errors)}} --}}
                                    @if($errors->any())
                                    @if(old("category") == "1")
                                    <script>
                                        $('input:radio[value="1"][name="category"]').prop('checked', true);
                                    </script>
                                    @else
                                    @endif
                                    
                                    @endif
                                    
                                    
                                    <div class="add-btn">
                                        <button type="submit" class="btn btn-success">Update</button>
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
            $('#cat_list_div').hide();
            $('#sub_cat_div').hide();
            $('input:radio[name="category"]').change(function(){
                var checkedValue = $('input[name="category"]:checked').val();
                if (checkedValue == 0) {
                    $('#cat_list_div').hide();
                    $('#sub_cat_div').hide();
                    $('#cat_name_div').show();
                } else {
                    $('#cat_list_div').show();
                    $('#sub_cat_div').show();
                    $('#cat_name_div').hide();
                }
            });
            
            var checkedValue1 = $('input[name="category"]:checked').val();
            if (checkedValue1 == 0) {
                $('#cat_list_div').hide();
                $('#sub_cat_div').hide();
                $('#cat_name_div').show();
            } else {
                $('#cat_list_div').show();
                $('#sub_cat_div').show();
                $('#cat_name_div').hide();
            }
            
        </script>
        @endsection