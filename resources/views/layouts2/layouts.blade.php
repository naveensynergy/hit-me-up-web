<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Panel</title>

  <script src="{{ url('assets/js/jquery-jquery.min.js')}}"></script>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('assets/css/css-all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/css/css-adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('datatables/css/dataTables.bootstrap4.min.css') }}">
  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  @include('customstyle')
  <style>
    .help-block {
      color: red;
    }

    .dataTables_filter input{
      width: 400px !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse" >
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('logout', []) }}" role="button">
            <i class="fas fa-sign-out-alt" title="log out"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{url('/option_management')}}" class="brand-link" style="text-align:center">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::user()->role==1)
            <li class="nav-item @if(Request::is('option_management')) active @endif">
              <a href="{{url('/option_management')}}" class="nav-link @if (Request::is('option_management')) active @endif">
                <i class="nav-icon fas fa-bars"></i>
                <p>Options Management</p>
              </a>
            </li>

            @endif
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


  </div>
  <!-- ./wrapper -->

  <script src="{{ url("assets/js/jquery.dataTables.min.js")}}"></script>
  <script src="{{ url("assets/js/dataTables.bootstrap4.min.js")}}"></script>
  <script src="{{ url("assets/js/dataTables.responsive.min.js")}}"></script>
  <!-- Bootstrap -->
  <script src="{{ url("assets/js/js-bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE -->
  <script src="{{ url("assets/js/js-adminlte.js")}}"></script>

  <script>
    $('.dataTables_filter input[type="search"]').css(
     {'width':'350px','display':'inline-block'}
     );

    $(function () {
      $('#datatable1').DataTable({
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "pageLength": 50,
        "columns": [
        { "width": "10%" },
        { "width": "25%" },
        { "width": "30%" },
        { "width": "15%" },
        { "width": "10%" },
        ],
        "responsive": true,
      });

    });
  </script>

</body>
</html>
