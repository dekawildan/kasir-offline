<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <style>
        body {
            font-family: Cambria;
            font-size: small;
        }
    </style>
</head>
<body onload="window.print()">
    <div style="width: 60%; margin: 2% 20% 5% 20%;">
    @foreach($toko as $t)
        <h3 align="center">TOKO {{$t->toko_nama}}</h3>
        <br>
        <p>Kasir : {{Auth::user()->karyawan_nama}}</p>
    @endforeach
    <div style="text-align: justify; width:100%;">
    @foreach($jualmember as $j)
    <p>Nota : {{$j->nota_jual}}</p>
    <p>Tanggal : {{$j->tanggal_jual}} {{$jam}}</p>
    <hr style="border:1px dashed black;">
    @endforeach
    <p style="text-align: justify;" align="justify">
    <table width="100%">
    @foreach($nota as $n)
        <tr>
        <td width="80%" align="left">
            {{$n->barang_nama}} &nbsp; {{$n->jumlah_jual}} pcs x Rp.{{number_format($n->harga_jual,0,",",".")}} 
            @if($n->diskon != 0)
            - diskon (Rp.{{number_format($n->diskon,0,",",".")}})
            @endif
             = 
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
    <p style="text-align: right;">Tunai : Rp.<span id="tunai"></span></p>
    <p style="text-align: right;">Kembali : Rp.<span id="kembali"></span></p>
    <p style="text-align: right;">Pembayaran : <strong>Cash</strong></p>
    <p>&nbsp;</p>
    <p align="center"><i>** Barang yang sudah dibeli, tidak dapat ditukar atau dikembalikan **</i></p>
    </div>
    </div>

    <script>
        function getCookie(name) {
                            let value = `; ${document.cookie}`;
                            let parts = value.split(`; ${name}=`);
                            if (parts.length === 2) return parts.pop().split(';').shift();
        }
        document.querySelector("#kembali").innerHTML = getCookie("Kembali");
        document.querySelector("#tunai").innerHTML = getCookie("Tunai");
    </script>

</body>
</html>