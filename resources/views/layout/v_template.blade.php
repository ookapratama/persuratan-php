
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIMS Desa | @yield('title')</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="csrf-token" content="{{ csrf_token() }}" >

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('template')}}/bower_components/toastr/toastr.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <link rel="stylesheet" href="{{asset('bootstrap')}}/css/app.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SIM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">SIM Desa Lampenai</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- Notifications: style can be found in dropdown.less -->

              <!-- Tasks: style can be found in dropdown.less -->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->name }}
                      <small>{{ Auth::user()->email }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                          <button type="submit" class="btn btn-default btn-flat">Log out</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <p style="font-size: 11px"><i class="fa fa-circle text-success"></i>
                {{ Auth::user()->jabatan }}
              </p>
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          @include('layout.v_nav')

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>Copyright &copy; 2022 <span style="color:#3C8DBC;">Desa Lampenai</span>.</strong> All rights reserved.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    {{-- GENERAL MODAL --}}

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" id="typeModal" role="document">
        <div class="modal-content">

          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="modalTitle"><strong></strong></h4>
          </div>

          <div class="modal-body">
            <div id="page" class="p-2"></div>
          </div>

        </div>
      </div>
    </div>
  
  {{-- END  GENERAL MODAL --}}

  {{-- ACCEPT MODAL --}}

  <div class="modal fade" id="modalAccept">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="titleAccept"></h4>
          </div>
          <div class="modal-body" align="center"><h4 id="bodyAccept"></h4></div>
          <div class="modal-footer">
            <button class="btn btn-secondary pull-left" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-success" id="actionAccept">Ya</a>
          </div>
      </div>
    </div>
  </div>

  {{-- END ACCEPT MODAL --}}

  {{-- MODAL DELETE --}}

  <div class="modal modal-danger fade" id="modalDelete">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span style="color: white" aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="titleDelete"></h4>
          </div>
          <div class="modal-body" align="center"><h4 id="bodyDelete"></h4></div>
          <div class="modal-footer">
            <button class="btn btn-outline pull-left" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-outline" id="actionDelete">Ya</a>
          </div>
      </div>
    </div>
  </div>

  {{-- END MODAL DELETE --}}

    <!-- jQuery 3 -->
    <script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    

    <!-- jQuery validate 1.19.3 -->
    <script src="{{asset('template')}}/bower_components/jquery-validation-1.19.3/dist/jquery.validate.min.js"></script>
    <script src="{{asset('template')}}/bower_components/jquery-validation-1.19.3/dist/additional-methods.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="{{asset('template')}}/bower_components/toastr/toastr.min.js"></script>

    <!-- SlimScroll -->
    <script src="{{asset('template')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <!-- FastClick -->
    <script src="{{asset('template')}}/bower_components/fastclick/lib/fastclick.js"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template')}}/dist/js/demo.js"></script>

    <script>
      $(document).ready(function () {
        $('.sidebar-menu').tree()
        
      });
    </script>


@yield('script')
</body>


</html>
