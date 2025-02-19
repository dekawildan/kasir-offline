<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barcode Barang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="bootstrap.min.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container mt-4">
        <div class="row mx-4">
            <div class="col-lg-6">
            @foreach($barang as $b)
            <div class="mb-3">
            {{$b->barang_kode}}<br>
            {{$b->barang_nama}}<br>
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($b->barang_kode, 'C128')}}" alt="barcode" />
            </div>
            @endforeach
            </div>
        </div>
    </div>
</body>
</html>