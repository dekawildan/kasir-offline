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
 <!--  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> -->
  <link rel="stylesheet" href="datatables.min.css">

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

  @if(empty(Session::has('nota')))
        <script>
            alert('Klik tombol mulai transaksi');
            window.location.href="{{url('jual')}}";
        </script>
    @else

          <div class="col-sm-4">
            <div class="modal-header bg-info mb-0 mt-0">
              Scan/Masukkan Nomor Barang :
            </div>
            <div class="modal-body py-3 mb-0 mt-0" style="background-color: lightgrey;">
              <form method="post" action="{{route('cruddetail.store')}}">
                @csrf
                @method('POST')
                <input type="text" name="caribarang" class="form-control" placeholder="Nomor Barang..." autofocus required>
                <button class="btn btn-primary mt-1" style="width: 100%;" type="submit">Cari</button>
              </form>
            </div>
          </div>

          <div class="col-sm-6 mx-3">
            <div class="modal-header bg-info mb-0 mt-0">
              Transaksi
            </div>
            <div class="modal-body py-3 mb-0 mt-0" style="border:1px solid lightgrey; background-color:lightgrey;">
                @if(Session::has('nota'))
                  Nomor Nota : {{Session::get('nota')}}<br>
                  Member : {{Session::get('customer')}}<br>
                  Kasir : {{Auth::user()->karyawan_nama}}
                @endif
            </div>
        </div>

        <div class="col-lg-10 mx-3 my-4 bg-light">
            <div class="table-responsive">
                <table class="table table-border table-striped table-hover" id="tabledetail">
                      <thead>
                          <tr>
                            <td>NO</td>
                            <td>BARANG</td>
                            <td>JUMLAH BELANJA</td>
                            <td>DISKON</td>
                            <td>TOTAL BAYAR</td>
                            <td>TINDAKAN</td>
                          </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        @foreach($detail as $d)
                        <form method="post" action="{{route('cruddetail.update', $d->detail_id)}}">
                          @csrf
                          @method('PUT')
                            <tr>
                              <td>{{$no++}}</td>
                              <td><input type="text" name="barang" value="{{$d->barang_nama}}" class="form-control" disabled>
                                <input type="hidden" name="barang_id" value="{{$d->barang_id}}">
                                <input type="hidden" name="harga_jual" value="{{$d->harga_jual}}" id="jual{{$d->detail_id}}">
                              </td>
                              <td><input type="number" value="{{$d->jumlah_jual}}" id="jml{{$d->detail_id}}" name="jumlah_jual" class="form-control" readonly required></td>
                              <td><input type="number" value="{{$d->diskon}}" id="diskon{{$d->detail_id}}" class="form-control" name="diskon" readonly required></td>
                              <td><input type="number" value="{{$d->total_bayar}}" name="total_bayar" class="form-control" id="total{{$d->detail_id}}" readonly required></td>
                              <td>
                                <button type="button" id="btnbuka{{$d->detail_id}}" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="submit" id="btnupdate{{$d->detail_id}}" class="btn btn-success btn-sm" style="display: none;">Update</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus{{$d->detail_id}}">Hapus</button>
                              </td>
                            </tr>
                          </form>

                          <div class="modal" id="hapus{{$d->detail_id}}" role="dialog" data-backdrop="static">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3>Hapus Barang {{$d->barang_nama}}</h3>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                          <form method="post" action="{{route('cruddetail.destroy', $d->detail_id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <p>Yakin menghapus data ini ?</p>
                                            <button class="btn btn-danger" type="submit">Ya</button> 
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                          </form>
                                      </div>
                                      <div class="modal-footer">

                                      </div>
                                    </div>
                                  </div>
                                </div>

                          <script>
                            document.querySelector("#btnbuka{{$d->detail_id}}").addEventListener("click", function() {
                              document.querySelector("#jml{{$d->detail_id}}").removeAttribute("readonly");
                              document.querySelector("#diskon{{$d->detail_id}}").removeAttribute("readonly");
                              document.querySelector("#total{{$d->detail_id}}").removeAttribute("readonly");
                              document.querySelector("#jml{{$d->detail_id}}").removeAttribute("readonly");
                              document.querySelector("#btnbuka{{$d->detail_id}}").style.display="none";
                              document.querySelector("#btnupdate{{$d->detail_id}}").style.display="block";
                            });

                            document.querySelector("#jml{{$d->detail_id}}").addEventListener("keyup", function() {
                              const hrgjual=document.querySelector("#jual{{$d->detail_id}}").value;
                              const diskon=document.querySelector("#diskon{{$d->detail_id}}").value;
                              const jml=document.querySelector("#jml{{$d->detail_id}}").value;
                              const bayar=(hrgjual*jml)-diskon;
                              document.querySelector("#total{{$d->detail_id}}").value=bayar;
                            });

                            document.querySelector("#diskon{{$d->detail_id}}").addEventListener("keyup", function() {
                              const hrgjual1=document.querySelector("#jual{{$d->detail_id}}").value;
                              const diskon1=document.querySelector("#diskon{{$d->detail_id}}").value;
                              const jml1=document.querySelector("#jml{{$d->detail_id}}").value;
                              const bayar1=(hrgjual1*jml1)-diskon1;
                              document.querySelector("#total{{$d->detail_id}}").value=bayar1;
                            });
                          </script>
                        @endforeach
                        <tr>
                          <td colspan="4" style="text-align:right;">Total Bayar :</td>
                          <td style="text-align:center;"><input name="totbayar" type="number" id="totbayar" class="form-control" value="{{$total}}" readonly></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4" style="text-align:right;">Tunai :</td>
                          <td style="text-align:center;"><input name="tunai" type="number" id="tunai" class="form-control"></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4" style="text-align:right;">Kembalian :</td>
                          <td style="text-align:center;"><input name="kembali" type="number" id="kembali" class="form-control" readonly></td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="5"><button id="cetak" class="btn btn-success btn-md" style="display:none; width:100%;"><i class="fa fa-print"></i> Cetak Struk</button></td>
                        </tr>
                      </tbody>
                </table>
                <script>
                    document.querySelector("#tunai").addEventListener("keyup", function() {
                      const total=document.querySelector("#totbayar").value;
                      const tunai=document.querySelector("#tunai").value;
                      const kembalian=tunai-total;
                      document.querySelector("#kembali").value=kembalian;
                      document.querySelector("#cetak").style.display="block";
                    });

                    document.querySelector("#cetak").addEventListener("click", function() {
                      let tot=Number(document.querySelector("#totbayar").value);
                      let tun=Number(document.querySelector("#tunai").value);

                      if(tun >= tot) {
                        document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

                        document.cookie = "Kembali="+document.querySelector("#kembali").value;
                        document.cookie = "Tunai="+document.querySelector("#tunai").value;
                        
                        window.open("{{url('cetakstruk')}}/{{session()->get('nota')}}","_blank");
                        window.location.href="{{url('jual')}}";
                      } else {
                        alert("Uang Tunai kurang");
                      }
                    });
                      
                </script>
            </div>
        </div>

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

<script>
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
$('#tabledetail').on( 'error.dt', function ( e, settings, techNote, message ) {
console.log( 'An error has been reported by DataTables: ', message );
} ) .DataTable();
    $("#tabledetail").DataTable({
      searching: false,
      paging: false,
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
