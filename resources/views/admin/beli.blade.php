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
 <!--  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"> -->
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

.preloader {
  display: none;
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
          <form class="form-inline" method="post" action="{{url('caribeli')}}">
            @csrf
            @method('POST')
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="caridata" type="search" placeholder="Masukkan nomor nota atau nama barang" id="kolomcari" aria-label="Search" required>
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
            <a href="{{url('beli')}}" class="nav-link active">
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
      @if(Auth::user()->karyawan_level == 'ADMIN')
        <div class="row mb-2">
          <div class="col-lg-12">
            <h1 class="m-0">Data Belanja Modal</h1>
            <hr>
          </div><!-- /.col -->
          <div class="col-lg-12 bg-light">

          @if(Session::has('pesan'))
            <div class="alert alert-warning">
              {{Session::get('pesan')}}
              <button class="close" data-dismiss="alert">&times;</button>
            </div>
          @endif

            <div class="text-left mb-3">
          <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#tambah">+ Add</button>
          </div>
          <div class="table-responsive">
            <div style="float: right; margin:0;padding:0; width:50%; height:auto;">
            <span style="float:left; margin-top:2%;">Cari Data : </span><input class="form-control" type="search" id="carikolom" style="width:80%; float:left; margin:0;" placeholder="Cari nama barang...">
            </div>
          <table class="table table-bordered table-hover table-striped" id="tablebeli">
            <thead>
            <tr>
              <td>NO</td>
              <td>NO. NOTA</td>
              <td>KODE BARANG</td>
              <td>NAMA BARANG</td>
              <td>SUPPLIER</td>
              <td>TANGGAL BELI</td>
              <td>JUMLAH BARANG</td>
              <td>SATUAN</td>
              <td>HARGA BELI</td>
              <td>STOK AWAL</td>
              <td>HARGA JUAL</td>
              <td>TANGGAL EXPIRED</td>
              <td>TOTAL PEMBELIAN</td>
              <td>TINDAKAN</td>
            </tr>
            </thead>
            <tbody>
            <?php $no=1; ?>
            @foreach($beli as $ak)
              
              <tr>
                <td>{{$no++}}</td>
                <td>{{$ak->nota_beli}}</td>
                <td>{{$ak->barang_kode}}
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($ak->barang_kode, 'C128')}}" alt="barcode" />
                </td>
                <td>{{$ak->barang_nama}}</td>
                <td>{{$ak->supplier_nama}}</td>
                <td>{{$ak->tanggal_beli}}</td>
                <td>{{$ak->jumlah_barang}}</td>
                <td>{{$ak->satuan}}</td>
                <td>Rp.{{number_format($ak->harga_beli,0,',','.')}}</td>
                <td>{{$ak->jumlah_stok}}</td>
                <td>Rp.{{number_format($ak->harga_jual,0,',','.')}}</td>
                <td>{{$ak->tanggal_expired}}</td>
                <td>Rp.{{number_format($ak->total_beli,0,',','.')}}</td>
                <td>
                  <button class="btn btn-info btn-md" data-toggle="modal" data-target="#edit{{$ak->id_beli}}"><i class="fa fa-edit"></i></button> 
                  <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#hapus{{$ak->id_beli}}"><i class="fa fa-trash"></i></button>
                  <button class="btn btn-info btn-md" data-toggle="modal" data-target="#stok{{$ak->id_beli}}">STOK</button>

                  <!-- Modal Edit Admin -->
    <div class="modal" role="dialog" id="edit{{$ak->id_beli}}" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Edit Barang {{$ak->barang_nama}}</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{route('crudbeli.update', $ak->id_beli)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                No. Nota :
                <label class="input-group" for="nota">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-briefcase"></i>
                </div>
                </div>
                <input type="number" name="nota_beli" value="{{$ak->nota_beli}}" class="form-control" id="nota" placeholder="Nota Pembelian..." required>
                </label>
                </div>

                <div class="form-group">
                <input type="hidden" name="id_beli" value="{{$ak->id_beli}}" required>
                Barang :
                <label class="input-group" for="barang{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list"></i>
                  </div>
                </div>
                <select name="barang_kode" class="form-control" id="barang{{$ak->id_beli}}" required>
                  <option value="{{$ak->barang_kode}}" selected>{{$ak->barang_kode}}-{{$ak->barang_nama}}</option>
                  @foreach($barang as $b)
                    <option value="{{$b->barang_kode}}">{{$b->barang_kode}}-{{$b->barang_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Supplier :
                <label class="input-group" for="supplier{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-home"></i>
                  </div>
                </div>
                <select name="supplier_id" class="form-control" id="supplier{{$ak->id_beli}}" required>
                  <option value="{{$ak->supplier_id}}" selected>{{$ak->supplier_id}}-{{$ak->supplier_nama}}</option>
                  @foreach($supplier as $s)
                    <option value="{{$s->supplier_id}}">{{$s->supplier_id}}-{{$s->supplier_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Tanggal Pembelian :
                <label class="input-group" for="tglbeli">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-calendar"></i>
                </div>
                </div>
                <input type="date" name="tanggal_beli" value="{{$ak->tanggal_beli}}" class="form-control" id="tglbeli" required>
                </label>
                </div>

                <div class="form-group">
                Jumlah Barang :
                <label class="input-group" for="jmlbrg{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-filter"></i>
                  </div>
                </div>
                <input name="jumlah_barang" id="jmlbrg{{$ak->id_beli}}" value="{{$ak->jumlah_barang}}" type="number" class="form-control" placeholder="Jumlah Barang..." required>
                </label>
                </div>

                <div class="form-group">
                Satuan :
                <label class="input-group" for="satuan{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list-alt"></i>
                  </div>
                </div>
                <select name="satuan" class="form-control" id="satuan{{$ak->id_beli}}" required>
                  <option value="{{$ak->satuan}}" selected>{{$ak->satuan}}</option>
                  <option>Lusin</option>
                    <option>Kodi</option>
                    <option>Gross</option>
                    <option>Rim</option>
                    <option>Pack</option>
                    <option>Pcs</option>
                </select>
                </label>
                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#detail">Detail</button>
                </div>

                <div class="form-group">
                Jumlah Stok :
                <label class="input-group" for="jmlstok{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-filter"></i>
                  </div>
                </div>
                <input name="jumlah_stok" id="jmlstok{{$ak->id_beli}}" value="{{$ak->jumlah_stok}}" type="number" class="form-control" readonly required>
                </label>
                </div>

                <div class="form-group">
                Harga Beli :
                <label class="input-group" for="beli{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="harga_beli" id="beli{{$ak->id_beli}}" value="{{$ak->harga_beli}}" type="number" class="form-control" placeholder="Harga Beli..." required>
                </label>
                </div>

                <div class="form-group">
                Total Biaya :
                <label class="input-group" for="biaya{{$ak->id_beli}}">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="total_beli" id="biaya{{$ak->id_beli}}" value="{{$ak->total_beli}}" type="number" class="form-control" readonly required>
                </label>
                </div>

                <div class="form-group">
                Harga Jual :
                <label class="input-group" for="jual">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="harga_jual" id="jual" type="number" value="{{$ak->harga_jual}}" class="form-control" placeholder="Harga Jual..." required>
                </label>
                </div>

                <div class="form-group">
                Tanggal Expired :
                <label class="input-group" for="expired">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-calendar"></i>
                </div>
                </div>
                <input type="date" name="tanggal_expired" value="{{$ak->tanggal_expired}}" class="form-control" id="expired" required>
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
    <div class="modal" id="hapus{{$ak->id_beli}}" role="dialog" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Hapus Stok Barang {{$ak->barang_nama}}</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{route('crudbeli.destroy', $ak->id_beli)}}">
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

    <!-- Modal Detail Stok -->
    <div class="modal" id="stok{{$ak->id_beli}}" role="dialog" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Stok Barang {{$ak->barang_nama}}</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            @foreach($totalstok as $stok)
            @if($stok->barang_kode == $ak->barang_kode)
            <p>Nomor Barang : {{$stok->barang_kode}}</p>
            <p>Stok Tersedia : <strong>{{$stok->total_stok}}</strong></p>
            @endif
            @endforeach
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <script>
      document.querySelector("#biaya{{$ak->id_beli}}").addEventListener("click", function() {
    let jmlx=document.querySelector("#jmlbrg{{$ak->id_beli}}").value;
    let hrgx=document.querySelector("#beli{{$ak->id_beli}}").value;
    let totx=jml*hrg;
    document.querySelector("#biaya{{$ak->id_beli}}").value=totx;
  });

  document.querySelector("#beli{{$ak->id_beli}}").addEventListener("keyup", function() {
    let jumlahx=document.querySelector("#jmlbrg{{$ak->id_beli}}").value;
    let hrgbelix=document.querySelector("#beli{{$ak->id_beli}}").value;
    let totalx=jumlahx*hrgbelix;
    document.querySelector("#biaya{{$ak->id_beli}}").value=totalx;
  });

  document.querySelector("#jmlstok{{$ak->id_beli}}").addEventListener("click", function() {
    let jmlbrg1x=document.querySelector("#jmlbrg{{$ak->id_beli}}").value;
    let satuan1x=document.querySelector("#satuan{{$ak->id_beli}}").value;
    if(satuan1x == 'Lusin') {
      let stok6x=jmlbrg1x*12;
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=stok6x;
    } else if(satuan1x == 'Kodi') {
      let stok7x=jmlbrg1x*20;
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=stok7x;
    } else if(satuan1x == 'Gross') {
      let stok8x=jmlbrg1x*144;
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=stok8x;
    } else if(satuan1x == 'Rim') {
      let stok9x=jmlbrg1x*500;
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=stok9x;
    } else if(satuan1x == 'Pack') {
      let stok10x=jmlbrg1x*10;
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=stok10x;
    } else if(satuan1x == 'Pcs') {
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=jmlbrg1x;
    } else {
      document.querySelector("#jmlstok{{$ak->id_beli}}").value=jmlbrg1x;
    }
  });
    </script>
                </td>
              </tr>
              
            @endforeach
            </tbody>
          </table>
          </div>
           
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
    <div class="modal modalku" role="dialog" id="tambah" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Tambah Barang</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{route('crudbeli.store')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                No. Nota :
                <label class="input-group" for="nota">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-briefcase"></i>
                </div>
                </div>
                <input type="number" name="nota_beli" class="form-control" id="nota" placeholder="Nota Pembelian..." required>
                </label>
                </div>

                <div class="form-group">
                <input type="hidden" name="id_beli" required>
                Barang :
                <label class="input-group" for="barang">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list"></i>
                  </div>
                </div>
                <select name="barang_kode" class="form-control katalog" id="barang" required>
                  @foreach($barang as $b)
                    <option value="{{$b->barang_kode}}">{{$b->barang_kode}}-{{$b->barang_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Supplier :
                <label class="input-group" for="supplier">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-home"></i>
                  </div>
                </div>
                <select name="supplier_id" class="form-control katalog" id="supplier" required>
                  @foreach($supplier as $s)
                    <option value="{{$s->supplier_id}}">{{$s->supplier_id}}-{{$s->supplier_nama}}</option>
                  @endforeach
                </select>
                </label>
                </div>

                <div class="form-group">
                Tanggal Pembelian :
                <label class="input-group" for="tglbeli">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-calendar"></i>
                </div>
                </div>
                <input type="date" name="tanggal_beli" class="form-control" id="tglbeli" required>
                </label>
                </div>

                <div class="form-group">
                Jumlah Barang :
                <label class="input-group" for="jmlbrg">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-filter"></i>
                  </div>
                </div>
                <input name="jumlah_barang" id="jmlbrg" value="0" type="number" class="form-control" placeholder="Jumlah Barang..." required>
                </label>
                </div>

                <div class="form-group">
                Satuan :
                <label class="input-group" for="satuan">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-list-alt"></i>
                  </div>
                </div>
                <select name="satuan" class="form-control katalog" id="satuan" required>
                  <option>Lusin</option>
                    <option>Kodi</option>
                    <option>Gross</option>
                    <option>Rim</option>
                    <option>Pack</option>
                    <option>Pcs</option>
                </select>
                </label>
                <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#detail">Detail</button>
                </div>

                <div class="form-group">
                Jumlah Stok :
                <label class="input-group" for="jmlstok">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-filter"></i>
                  </div>
                </div>
                <input name="jumlah_stok" id="jmlstok" value="0" type="number" class="form-control" readonly required>
                </label>
                </div>

                <div class="form-group">
                Harga Beli :
                <label class="input-group" for="beli">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="harga_beli" id="beli" type="number" value="0" class="form-control" placeholder="Harga Beli..." required>
                </label>
                </div>

                <div class="form-group">
                Total Biaya :
                <label class="input-group" for="biaya">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="total_beli" id="biaya" value="0" type="number" class="form-control" readonly required>
                </label>
                </div>

                <div class="form-group">
                Harga Jual :
                <label class="input-group" for="jual">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  Rp.
                  </div>
                </div>
                <input name="harga_jual" id="jual" type="number" value="0" class="form-control" placeholder="Harga Jual..." required>
                </label>
                </div>

                <div class="form-group">
                Tanggal Expired :
                <label class="input-group" for="expired">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                  <i class="fa fa-calendar"></i>
                </div>
                </div>
                <input type="date" name="tanggal_expired" class="form-control" id="expired" required>
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

    <div class="modal" id="detail" role="dialog" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3>Detail Satuan</h3>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <img src="foto/satuan.png" width="100%">
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>

    @else
      <h1 align="center">MAAF ANDA DILARANG MENGAKSES HALAMAN INI</h1>
  @endif

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
    var table = new DataTable('#tablebeli',  {
      "dom":"lrtip"
    });
    // #column3_search is a <input type="text"> element
$('#carikolom').on('keyup', function () {
  var carinya = Number($('#carikolom').val());
  if (isNaN(carinya)) {
    table
        .columns(3)
        .search(this.value)
        .draw();
  } else if(Number(carinya)) {
    table
        .columns(1)
        .search(this.value)
        .draw();
  } else {
    table
        .columns()
        .search(this.value)
        .draw();
  }
});
  
    $(".katalog").select2({
      width : '90%',
      dropdownParent: $('#tambah')
    });
    @foreach($beli as $bl)
    $("#barang{{$bl->id_beli}}").select2({
      width : '90%',
      dropdownParent: $('#edit{{$bl->id_beli}}')
    });
    $("#supplier{{$bl->id_beli}}").select2({
      width : '90%',
      dropdownParent: $('#edit{{$bl->id_beli}}')
    });

    $("#satuan{{ $bl->id_beli }}").select2({
      width : '90%',
      dropdownParent: $('#edit{{$bl->id_beli}}')
    });
    @endforeach
  });
  let tgl=new Date();
  const tgl_skr=tgl.toLocaleDateString();
  document.querySelector("#tanggal").innerHTML=tgl_skr;

  const thn=new Date();
  const tahun=thn.getFullYear();
  document.querySelector("#tahun").innerHTML=tahun;

  document.querySelector("#biaya").addEventListener("click", function() {
    let jml=document.querySelector("#jmlbrg").value;
    let hrg=document.querySelector("#beli").value;
    let tot=jml*hrg;
    document.querySelector("#biaya").value=tot;
  });

  document.querySelector("#beli").addEventListener("keyup", function() {
    let jumlah=document.querySelector("#jmlbrg").value;
    let hrgbeli=document.querySelector("#beli").value;
    let total=jumlah*hrgbeli;
    document.querySelector("#biaya").value=total;
  });

  /* document.querySelector("#satuan").addEventListener("focus", function() {
    let jmlbrg=document.querySelector("#jmlbrg").value;
    let satuan=document.querySelector("#satuan").value;
    if(satuan == 'Lusin') {
      let stok1=jmlbrg*12;
      document.querySelector("#jmlstok").value=stok1;
    } else if(satuan == 'Kodi') {
      let stok2=jmlbrg*20;
      document.querySelector("#jmlstok").value=stok2;
    } else if(satuan == 'Gross') {
      let stok3=jmlbrg*144;
      document.querySelector("#jmlstok").value=stok3;
    } else if(satuan == 'Rim') {
      let stok4=jmlbrg*500;
      document.querySelector("#jmlstok").value=stok4;
    } else if(satuan == 'Pack') {
      let stok5=jmlbrg*10;
      document.querySelector("#jmlstok").value=stok5;
    } else if(satuan == 'Pcs') {
      document.querySelector("#jmlstok").value=jmlbrg;
    } else {
      document.querySelector("#").value=jmlbrg;
    }
  }); */

  document.querySelector("#jmlstok").addEventListener("click", function() {
    let jmlbrg1=document.querySelector("#jmlbrg").value;
    let satuan1=document.querySelector("#satuan").value;
    if(satuan1 == 'Lusin') {
      let stok6=jmlbrg1*12;
      document.querySelector("#jmlstok").value=stok6;
    } else if(satuan1 == 'Kodi') {
      let stok7=jmlbrg1*20;
      document.querySelector("#jmlstok").value=stok7;
    } else if(satuan1 == 'Gross') {
      let stok8=jmlbrg1*144;
      document.querySelector("#jmlstok").value=stok8;
    } else if(satuan1 == 'Rim') {
      let stok9=jmlbrg1*500;
      document.querySelector("#jmlstok").value=stok9;
    } else if(satuan1 == 'Pack') {
      let stok10=jmlbrg1*10;
      document.querySelector("#jmlstok").value=stok10;
    } else if(satuan1 == 'Pcs') {
      document.querySelector("#jmlstok").value=jmlbrg1;
    } else {
      document.querySelector("#").value=jmlbrg1;
    }
  });
</script>
</body>
</html>
