<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Omzet Penjualan</title>
</head>
<body onload="window.print()">
    <h2 align="center">LAPORAN OMZET PENJUALAN</h2>
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
                  <td>NAMA BARANG</td>
                  <td>NOTA JUAL</td>
                  <td>MEMBER</td>
                  <td>TANGGAL JUAL</td>
                  <td>HARGA JUAL</td>
                  <td>JUMLAH JUAL</td>
                  <td>DISKON</td>
                  <td>TOTAL PENJUALAN</td>
              </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach($cetaklaporan as $l)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$l->barang_nama}}</td>
                    <td>{{$l->nota_jual}}</td>
                    <td>{{$l->customer_nama}}</td>
                    <td>{{$l->tanggal_jual}}</td>
                    <td>
                        @foreach($hrgjual as $hrg)
                        @if($l->barang_id == $hrg->barang_id)
                            {{number_format($hrg->harga_jual,0,",",".")}}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$l->jumlah_jual}}</td>
                    <td>{{number_format($l->diskon,0,",",".")}}</td>
                    <td>{{number_format($l->total_bayar,0,",",".")}}</td>
                  </tr>
                @endforeach
                <tr>
                    <td colspan="8" style="text-align: right;"><strong>Total Omzet :</strong></td>
                    <td><strong>@foreach($totalomzet as $tb) Rp.{{number_format($tb->total,0,",",".")}} @endforeach</strong></td>
                </tr>
            </tbody>  
            </table>
</body>
</html>