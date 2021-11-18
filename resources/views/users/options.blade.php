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
            <li class="breadcrumb-item active">Options Management</li> 
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
              @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ Session::get('error') }}</div>
              @endif
              @if(Session::has('success'))
              <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              {{ Session::get('success') }}</div>
              @endif
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Options Management</h3>
              </div>
            </div>
            <div class="card-body">

              <a href="{{url('/add_option')}}" class="btn btn-success pull-left" style="float: left;">Add Option</a>
              <table id="datatable1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>S. No.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Click/Shown Ratio</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  @if(count($options)>0)
                  @foreach($options as $key => $option)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{!!$option->title!!}</td>
                    <td>{{$option->description}}</td>
                    <td>{{$option->clicked}}/{{$option->shown}} 
                      <?php
                      if ($option->clicked != 0){
                      $percentage = ($option->clicked/$option->shown)*100;
                      }else{
                      $percentage = 0 ;                        
                      }
                      ?>
                      &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
                      {{number_format($percentage, 2)}}%
                    </td>
                    <td>
                      <a href="{{ url('/edit_option')}}/{{@$option->id}}" class="btn btn-info">Edit</a>
                      <a href="{{ url('/delete_option/')}}/{{@$option->id}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-warning">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="4">No Record</td>                          
                  </tr>
                  @endif
                </tbody>

              </table>
            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.row -->
    </div>

  </div>
  <!-- /.content -->
  {{-- <script type="text/javascript" src="{{url('admin/js/custom.js')}}?q={{time()}}"></script>   --}}

  @if(Session::has('error'))
  
  <script type="text/javascript">
    setTimeout(function() {
      $('.alert').fadeOut('slow');
    }, 3000);

    window.onload = function(){ 
      $(document).ready(function(){
        alert("{{Session::get('error')}}");
      });
    }


  </script>

  @endif


  @endsection