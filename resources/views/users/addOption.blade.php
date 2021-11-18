  @extends('layouts.layouts')

  @section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('/option_management')}}">Options Management</a></li>
            <li class="breadcrumb-item active">Add Option</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Add Option</h3>
              </div>
            </div>
            <div class="card-body">
              <form action="{{url('/insert_option')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Title">Title<span class="help-block">*</span></label>
                      <textarea class="form-control" name="Title" rows="5">
                        {{ old('Title') }}
                      </textarea> 
                      @if ($errors->has('Title'))
                        <span class="help-block">
                          <strong>{{ $errors->first('Title') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Description">Description<span class="help-block">*</span></label>
                      <input type="text" class="form-control" name="Description" value="{{ old('Description') }}" >
                      @if ($errors->has('Description'))
                        <span class="help-block">
                          <strong>{{ $errors->first('Description') }}</strong>
                        </span>
                      @endif
                    </div>
                  </div>
                  
                </div>
                
                <button type="submit" class="btn btn-md btn-success">Submit</button>
              </form>
            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div>

  </div>
  <!-- /.content -->
  <script type="text/javascript" src="{{url('admin/js/custom.js')}}?q={{time()}}"></script>  

  @if(Session::has('error'))
  
  <script type="text/javascript">
    window.onload = function(){ 
     $(document).ready(function(){
      alert("{{Session::get('error')}}");
    });
   }
 </script>

 @endif

 @endsection