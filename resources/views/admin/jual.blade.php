<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Aplikasi Kasir</title>

  <!-- Google Font: Source Sans Pro -->
<!--   <link rel="stylesheet" href="googleapis.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
 <!--  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
<!--   <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
<!--   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
<!--   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->

  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="datatables.min.css">

  <style>
    .blink {
  animation: blinker 1s linear infinite;
}

.preloader {
  display: none;
}

.select2-selection {
  -webkit-box-shadow: 0;
  box-shadow: 0;
  background-color: #fff;
  border: 0;
  border-radius: 0;
  color: #555555;
  font-size: 14px;
  outline: 0;
  min-height: 35px;
  text-align: left;
}

.select2-selection__rendered {
  margin: 5px;
}

.select2-selection__arrow {
  margin: 5px;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
       <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
        
        <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle fa-2x"></i></a>
        <ul class="dropdown-menu pl-2">
            <li class="nav-item pt-2"><a href="{{url('logout')}}" class="btn btn-danger btn-md" style="width: 95%;">Logout</a></li>
        </ul>
      </li>

      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{strtoupper(Auth::user()->karyawan_nama)}}</span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <span style="color: white; font-weight: bolder; font-size: 1em; margin-left: 5px; font-family:Arial, Helvetica, sans-serif">Tanggal : </span><span id="tanggal" style="color: white; font-weight: bolder; font-size: 1em; margin-left: 5px; font-family: Arial, Helvetica, sans-serif;" class="blink"></span>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
            
          </li>
          <li class="nav-item">
          <a href="{{url('toko')}}" class="nav-link"><i class="nav-icon fa fa-home"></i> <p>Toko</p></a>
          </li>
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
            
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('customer')}}" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Member
              </p>
            </a>            
          </li> 
          <hr style="width:100%; border:1px solid white;">
          <li class="nav-item text-justify">
            <a href="javascript:void(0)" class="nav-link">
              <p style="width: 100%;">
                DATA MASTER <i class="fa fa-caret-left nav-icon right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
            <a href="{{url('kategori')}}" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('barang')}}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('supplier')}}" class="nav-link">
              <i class="nav-icon fas fa-store-alt"></i>
              <p>
                Supplier
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('beli')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Belanja Stok
              </p>
            </a>
          </li>

          </ul>
          </li>
          
          <li class="nav-item text-justify">
            <a href="javascript:void(0)" class="nav-link">
              <p style="width:100%;">
              TRANSAKSI <i class="fa fa-caret-left nav-icon right"></i>
            </p></a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('jual')}}" class="nav-link active">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
          </ul>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link">
              <p>
                LAPORAN <i class="fa fa-caret-left nav-icon right"></i>
              </p>
            </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('laporanbeli')}}" class="nav-link">
              <i class="nav-icon fas fa-wallet"></i>
              <p>
                Laporan Belanja
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{url('laporanjual')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Laporan Penjualan
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="{{url('backupdatabase')}}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Backup Database
              </p>
            </a>
          </li>

          </ul>
          </li>

          <hr style="width:100%; border:1px solid white;">
          
          <li class="nav-item">
            <a href="{{url('panduan')}}" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Panduan
              </p>
            </a>            
          </li> 
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12">
            <h1 class="m-0">Data Penjualan</h1>
            <hr>
          </div><!-- /.col -->
          <div class="col-lg-4">
             @if(Session::has('pesan'))
                <div class="alert alert-warning" data-dismiss="alert">
                  {{Session::get('pesan')}}
                  <button class="close" data-dismiss="alert">&times;</button>
                </div>
             @endif
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-10 mx-3">
            <div class="modal-header bg-info mb-0 mt-0">
              Transaksi
            </div>
            <div class="modal-body py-3 mb-0 mt-0" style="border:1px solid lightgrey; background-color:lightgrey;">
                @if(empty(Session::has('nota')))
                <form method="post" action="{{route('crudjual.store')}}">
                  @csrf
                  @method('POST')
                  Nomor Nota : {{$nota}} <input type="hidden" name="no_nota" value="{{$nota}}"><br>
                  Member : 
                  <select name="customer_id" class="form-control pilihan" required>
                      @foreach($member as $m)
                      <option value="{{$m->customer_id}}-{{$m->customer_nama}}">{{$m->nohp}}-{{$m->customer_nama}}</option>
                      @endforeach
                  </select> <br>
                  Kasir : <input type="text" class="form-control" name="karyawan_id" value="{{Auth::user()->karyawan_nama}}" readonly required><br>
                  <button type="submit" class="btn btn-primary">Mulai Transaksi</button>
                </form>
            </div>
          </div>

        </div>
        <!-- /.row -->

            
      </div><!-- /.container-fluid -->
      <br>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <table class="table table-bordered table-striped table-hover" id="tabeljual">
              <thead>
                <tr>
                  <td>NO</td>
                  <td>NO. NOTA</td>
                  <td>TANGGAL TRANSAKSI</td>
                  <td>CUSTOMER</td>
                  <td>TINDAKAN</td>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($jual as $j)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$j->nota_jual}}</td>
                    <td>{{$j->tanggal_jual}}</td>
                    <td>{{$j->customer_nama}}</td>
                    <td>
                      @if(Auth::user()->karyawan_level == 'ADMIN')
                      <button class="btn btn-danger" data-toggle="modal" data-target="#hapus{{$j->nota_jual}}">Hapus</button>

                      <div class="modal" role="dialog" id="hapus{{$j->nota_jual}}" data-backdrop="static">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h2>Konfirmasi Hapus {{$j->nota_jual}}</h2>
                              <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                  <form method="post" action="{{route('crudjual.destroy', $j->nota_jual)}}">
                                    @csrf
                                    @method('DELETE')
                                    Yakin menghapus data ini ?
                                    <input type="hidden" name="nota_jual" value="{{$j->nota_jual}}"> <br>
                                    <button type="submit" class="btn btn-danger">Hapus</button> &nbsp;
                                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                  </form>
                            </div>
                            <div class="modal-footer">
                              
                            </div>
                          </div>
                        </div>
                      </div>

                      @else
                        <button class="btn btn-default" disabled>Tidak ada</button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @else
                  <script>
                    window.location.href="{{url('detail')}}";
                  </script>
      @endif

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <span id="tahun"></span> <a href="https://www.bisasoftware.id/" target="_blank">www.bisasoftware.id</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<script src="plugins/select2/js/select2.min.js"></script>
<script src="datatables.min.js"></script>

<script>
  $(document).ready(function() {
    $(".pilihan").select2({
      width: '100%'
    });
    $("#tabeljual").DataTable();
  });

  let tgl=new Date();
  const tgl_skr=tgl.toLocaleDateString();
  document.querySelector("#tanggal").innerHTML=tgl_skr;

  const thn=new Date();
  const tahun=thn.getFullYear();
  document.querySelector("#tahun").innerHTML=tahun;
</script>
</body>
</html>
