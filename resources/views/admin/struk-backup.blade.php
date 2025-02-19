<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Cambria;
        }
    </style>
</head>
<body onload="window.print()">
    <div style="width: 60%; margin: 2% 20% 5% 20%;">
    @foreach($toko as $t)
        <h3 align="center">TOKO {{$t->toko_nama}}</h3>
        <h4 align="center">Alamat : {{$t->toko_alamat}}</h4>
        <h4 align="center">Telp / HP : {{$t->toko_hp}}</h4>
        <br>
        <br>
        <p>Kasir : {{Auth::user()->karyawan_nama}}</p>
    @endforeach
    <div style="text-align: justify; width:100%;">
    @foreach($jualmember as $j)
    <p>Nota : {{$j->nota_jual}}</p>
    <p>Tanggal : {{$j->tanggal_jual}}</p>
    <p style="text-align: right;">Member : {{$j->ke_customer->customer_nama}}</p>
    <hr style="border:1px dashed black;">
    @endforeach
    <p style="text-align: justify;" align="justify">
    <table width="100%">
    @foreach($nota as $n)
        <tr>
        <td width="80%" align="left">
            {{$n->barang_nama}} &nbsp; {{$n->jumlah_jual}} pcs x Rp.{{number_format($n->harga_jual,0,",",".")}} - diskon (Rp.{{number_format($n->diskon,0,",",".")}}) = 
        </td>
        <td width="20%" align="right">
        Rp.{{number_format($n->total_bayar,0,",",".")}}
        </td>
        </tr>
    @endforeach
    </table>
    </p>
    <hr style="border:1px dashed black;">
    <p style="text-align: right;">Total Bayar : Rp.{{number_format($total,0,",",".")}}</p>
    <p>&nbsp;</p>
    <p align="center"><i>** Barang yang sudah dibeli, tidak dapat dikembalikan **</i></p>
    </div>
    </div>

</body>
</html>