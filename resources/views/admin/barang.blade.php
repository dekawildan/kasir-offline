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
<!--   <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
<!--   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
<!--   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->
  <link rel="stylesheet" href="datatables.min.css">

  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

  <style>
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
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
       <div class="navbar-search-block">
          <form class="form-inline" method="post" action="{{url('caribarang')}}">
            @csrf
            @method('POST')
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="caridata" type="search" placeholder="Search" aria-label="Search">
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
        </div>
        
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
            <a href="{{url('barang')}}" class="nav-link active">
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
          <div class="col-lg-12">
            <h1 class="m-0">Data Barang</h1>
            <hr>
          </div><!-- /.col -->
          <div class="col-lg-12 bg-light">
  @if(Auth::user()->karyawan_level == 'ADMIN')

          @if(Session::has('pesan'))
            <div class="alert alert-warning">
              {{Session::get('pesan')}}
              <button class="close" data-dismiss="alert">&times;</button>
            </div>
          @endif

            <div class="text-left mb-3">
          <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">+ Add</button> 
          <a href="{{url('cetakbarcode')}}" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Generate Barcode</a>
          </div>
          <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped" id="tablebarang">
            <thead>
            <tr>
              <td>NO</td>
              <td>BARCODE</td>
              <td>KATALOG</td>
              <td>NAMA BARANG</td>
              <td>FOTO</td>
              <td>TINDAKAN</td>
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach($barang as $ak)
              @if($ak->count() > 0)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$ak->barang_kode}}<br>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($ak->barang_kode, 'C128')}}" alt="barcode" />
                </td>
                <td>{{$ak->ke_kategori->kategori_nama}}</td>
                <td>{{$ak->barang_nama}}</td>
                <td><img src="foto/{{$ak->barang_file}}" width="100" height="120"></td>
                <td>
                  <button class="btn btn-info btn-md" data-toggle="modal" data-target="#edit{{$ak->barang_id}}"><i class="fa fa-edit"></i></button> 
                  <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#hapus{{$ak->barang_id}}"><i class="fa fa-trash"></i></button>

                  <!-- Modal Edit Admin -->
    <div class="modal" role="dialog" id="edit{{$ak->barang_id}}" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Edit Barang {{$ak->barang_nama}}</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{route('crudbarang.update', $ak->barang_id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                Kode Barang :
                <label class="input-group" for="kode{{ $ak->barang_id }}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-key"></i>
                  </div>
                </div>
                <input type="text" name="barang_kode" id="kode{{ $ak->barang_id }}" value="{{ $ak->barang_kode }}" placeholder="Kode Barang..." class="form-control" required>
                </label>
                </div>

                <div class="form-group">
                <input type="hidden" name="barang_id" value="{{$ak->barang_id}}" required>
                Katalog :
                <label class="input-group" for="tgl">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list"></i>
                  </div>
                </div>
                <select name="kategori_id" class="form-control katalog" required>
                  <option value="{{$ak->kategori_id}}" selected>{{$ak->kategori_id}}-{{$ak->ke_kategori->kategori_nama}}</option>
                  @foreach($kategori as $k)
                    <option value="{{$k->kategori_id}}">{{$k->kategori_id}}-{{$k->kategori_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Nama Barang :
                <label class="input-group" for="nama">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-briefcase"></i>
                </div>
                </div>
                <input type="text" name="barang_nama" value="{{$ak->barang_nama}}" class="form-control" id="nama" placeholder="Nama Barang..." required>
                </label>
                </div>

                <div class="form-group">
                Foto :
                <img src="foto/{{$ak->barang_file}}" style="width: 150px; height: 160px;"><br>
                <label class="input-group" for="file">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-image"></i>
                  </div>
                </div>
                <input name="barang_file" accept=".jpg,.png,.bmp,.gif" id="file" type="file" class="form-control" required>
                </label>
                </div>

                <button class="btn btn-success btn-md" type="submit">Ubah</button> 
                <button class="btn btn-secondary btn-md" type="reset" data-dismiss="modal">Batal</button>
              </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Hapus Admin -->
    <div class="modal" id="hapus{{$ak->barang_id}}" role="dialog" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Hapus Barang {{$ak->barang_nama}}</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('crudbarang.destroy', $ak->barang_id)}}">
              @csrf
              @method('DELETE')
              <p>Yakin menghapus data ini ?</p>
              <button class="btn btn-danger" type="submit">Ya</button> 
              <button class="btn btn-secondary" type="reset" data-dismiss="modal">Batal</button>
            </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
                </td>
              </tr>
              @else
                <tr>
                  <td colspan="9" style="text-align: center;">BELUM ADA DATA</td>
                </tr>
              @endif
            @endforeach
            </tbody>
          </table>
          </div>

  @else
      <h2 align="center">MAAF ANDA DILARANG MENGAKSES HALAMAN INI</h2>
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

          <!-- Modal Tambah Barang -->
    <div class="modal" role="dialog" id="tambah" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Tambah Barang</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{route('crudbarang.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                Kode Barang :
                <label class="input-group" for="kode">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-key"></i>
                  </div>
                </div>
                <input type="text" name="barang_kode" id="kode" placeholder="Kode Barang..." class="form-control" required>
                </label>
                </div>

                <div class="form-group">
                Katalog :
                <label class="input-group" for="tgl">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list"></i>
                  </div>
                </div>
                <select name="katalog_id" class="form-control" id="katalog" required>
                  @foreach($kategori as $k)
                    <option value="{{$k->kategori_id}}">{{$k->kategori_id}}-{{$k->kategori_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Nama Barang :
                <label class="input-group" for="nama">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-briefcase"></i>
                </div>
                </div>
                <input type="text" name="barang_nama" class="form-control" id="nama" placeholder="Nama Barang..." required>
                </label>
                </div>

                <div class="form-group">
                Foto :
                <label class="input-group" for="file">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-image"></i>
                  </div>
                </div>
                <input name="barang_file" id="file" accept=".jpg,.png,.bmp,.gif" type="file" class="form-control" required>
                </label>
                </div>

                <button class="btn btn-success btn-md" type="submit">Tambah</button> 
                <button class="btn btn-secondary btn-md" type="reset" data-dismiss="modal">Batal</button>
              </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

        </div>
        <!-- /.row -->

            
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
<script src="datatables.min.js"></script>
<script src="plugins/select2/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $("#tablebarang").DataTable();
    $("#katalog").select2({
      width : '90%'
    });
    $(".katalog").select2({
      width : '90%'
    });
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
