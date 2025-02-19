<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | Aplikasi Kasir</title>

  <!-- Google Font: Source Sans Pro -->
 <!--  <link rel="stylesheet" href="googleapis.css"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
 <!--  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
<!--   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->

  <style>
    .blink {
  animation: blinker 1s linear infinite;
}

.preloader {
  display: none;
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
      <li class="nav-item dropdown">
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> -->
       <!--  <div class="navbar-search-block">
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
            <a href="{{url('dashboard')}}" class="nav-link active">
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
            <a href="{{url('jual')}}" class="nav-link">
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
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  {{count($akun)}}
                </h3>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="{{url('admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  {{count($barang)}}
                </h3>

                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="fa fa-suitcase"></i>
              </div>
              <a href="{{url('barang')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  {{count($supplier)}}
                </h3>

                <p>Supplier</p>
              </div>
              <div class="icon">
                <i class="fa fa-store-alt"></i>
              </div>
              <a href="{{url('supplier')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{count($jual)}}</h3>

                <p>Total Transaksi Penjualan</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$detail}}</h3>

                <p>Total Barang Terjual</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{count($penjualanhariini)}}</h3>

                <p>Penjualan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  {{count($customer)}}
                </h3>

                <p>Member</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="{{url('customer')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  {{count($beli)}}
                </h3>

                <p>Total Pembelanjaan</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="{{url('beli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  {{count($pembelianhariini)}}
                </h3>

                <p>Pembelanjaan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="{{url('beli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  Rp.{{number_format($totalmodalbulanini,0,",",".")}},-
                </h3>

                <p>Modal Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{url('beli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  Rp.{{number_format($totalmodal,0,",",".")}},-
                </h3>

                <p>Total Modal</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{url('beli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  Rp.{{number_format($omzetbulanini,0,",",".")}},-
                </h3>

                <p>Omzet Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{url('jual')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  Rp.{{number_format($totalomzet,0,",",".")}},-
                </h3>

                <p>Total Omzet</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{url('jual')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  Rp.{{number_format($lababulanini,0,",",".")}},-
                </h3>

                <p>Laba Bersih Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="fa fa-wallet"></i>
              </div>
              <a href="{{url('jual')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  {{$totalstok}}
                </h3>

                <p>Total Stok Barang</p>
              </div>
              <div class="icon">
                <i class="fa fa-briefcase"></i>
              </div>
              <a href="{{url('beli')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
        <!-- /.row -->

        <section class="col-lg-12 connectedSortable">
        <div class="card">
<div class="card-header">
<h3 class="card-title">
<i class="fas fa-chart-pie mr-1"></i>
Penjualan Terlaris
</h3>
<div class="card-tools">
<ul class="nav nav-pills ml-auto">
<li class="nav-item">
&nbsp;
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="tab-content p-0">

<div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="barchart"></canvas>
    </div>
  </div>

</div>
</div>
</div>
        </section>

            
      </div><!-- /.container-fluid -->
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
<script src="plugins/chart.js/Chart.min.js"></script>
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

<script>
		var ctx = document.getElementById("barchart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [
          @foreach($barangpopuler as $pop)
            "{{$pop->barang_nama}}",
          @endforeach
        ],
				datasets: [{
					label: '',
					data: [
					@foreach($jmlterjual as $jml)
            "{{$jml->jml_jual}}",
          @endforeach
          ],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>


<script>
  let tgl=new Date();
  const tgl_skr=tgl.toLocaleDateString();
  document.querySelector("#tanggal").innerHTML=tgl_skr;

  const thn=new Date();
  const tahun=thn.getFullYear();
  document.querySelector("#tahun").innerHTML=tahun;
</script>
</body>
</html>
