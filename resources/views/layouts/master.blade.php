<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Invoice</title>

  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
       
      </ul>
    

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{asset("img/logo.png")}}" alt="Adm" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Invoice</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
               
               <li class="nav-item">
                <router-link to="/home" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt orange"></i>
                  <p>
                    Dashboard
                   
                  </p>
                </router-link>
              </li>
               <li class="nav-item">
                <router-link to="/customer" class="nav-link">
                    <i class="nav-icon fas fa-users pink"></i>
                  <p>
                    Customer
                   
                  </p>
                </router-link>
              </li>
               <li class="nav-item">
                <router-link to="/invoice" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar teal"></i>
                  <p>
                    Invoice
                  </p>
                </router-link>
              </li>
               {{-- <li class="nav-item">
               <router-link  to="/dummy" class="nav-link">
                    <i class="nav-icon fas fa-file-invoice-dollar teal"></i>
                  <p>
                    Print Invoice
                   
                  </p>
                </router-link>
              </li> --}}
             
               
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  <i class="fas fa-power-off nav-icon red"></i>
                  <p>
                      {{ __('Logout') }}
                  </p>
               </a>
    
           <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
               @csrf
           </form>
      </li>
            
           
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">

                    <router-view></router-view>
                    {{-- <vue-progress-bar></vue-progress-bar> --}}
              </div>


          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">Shahin Alam</a>.</strong> All rights reserved.
  </footer> --}}
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
  
</script>
<script src="{{asset('js/app.js')}}"></script>
 <script src="https://kit.fontawesome.com/bad080b564.js" crossorigin="anonymous"></script>
</body>
</html>