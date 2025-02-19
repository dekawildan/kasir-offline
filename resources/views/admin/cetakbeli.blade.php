<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Modal Belanja</title>
</head>
<body onload="window.print()">
    <h2 align="center">LAPORAN MODAL BELANJA</h2>
@foreach($toko as $t)
        <h3 align="center">TOKO {{$t->toko_nama}}</h3>
        <h4 align="center">Alamat : {{$t->toko_alamat}}</h4>
        <h4 align="center">Telp / HP : {{$t->toko_hp}}</h4>
        <hr>
    @endforeach
    <br>
<table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
              <tr>
                  <td>NO</td>
                  <td>KATEGORI</td>
                  <td>NAMA BARANG</td>
                  <td>NOTA BELANJA</td>
                  <td>SUPPLIER</td>
                  <td>TANGGAL BELANJA</td>
                  <td>JUMLAH BARANG</td>
                  <td>SATUAN</td>
                  <td>HARGA SATUAN</td>
                  <td>TOTAL BELANJA</td>
              </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($cetaklaporan as $l)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$l->kategori_nama}}</td>
                    <td>{{$l->barang_nama}}</td>
                    <td>{{$l->nota_beli}}</td>
                    <td>{{$l->supplier_nama}}</td>
                    <td>{{$l->tanggal_beli}}</td>
                    <td>{{$l->jumlah_barang}}</td>
                    <td>{{$l->satuan}}</td>
                    <td>Rp.{{number_format($l->harga_beli,0,",",".")}}</td>
                    <td>Rp.{{number_format($l->total_beli,0,",",".")}}</td>
                  </tr>
                @endforeach
                <tr>
                    <td colspan="9" style="text-align: right;"><strong>Total Belanja :</strong></td>
                    <td><strong>@foreach($totalbelanja as $tb) Rp.{{number_format($tb->total,0,",",".")}} @endforeach</strong></td>
                </tr>
            </tbody>  
            </table>
</body>
</html>