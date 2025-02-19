<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Login | Bisa Kasir</title>
</head>
<body>

    <div class="container-fluid mt-0">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-4 col-lg-4 d-md-block mt-0 sidebar bg-primary">
                <div class="sidebar-sticky">
                    <h3 style="text-align: center;" class="text-light">LOGIN APLIKASI</h3>
                    <hr style="border:1px solid white;">
                    <form class="py-5 mt-3 text-light" method="post" action="{{url('proseslogin')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="email" name="email" class="form-control" id="username" placeholder="Masukkan email anda" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password :</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password anda" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </form>
                    <div class="mt-4 py-5 text-light">
                        <p>&copy; <span id="tahun"></span> www.bisasoftware.id. All Reserved</p>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-8 col-lg-8 px-0 mt-0 main">
               <div style="position: absolute; background-color: black; opacity:0.5; height:100vh;" class="mt-0 px-0 col-md-12 col-lg-12"></div>
                <!-- Article Content -->
                <div class="container mt-5 py-5 px-5 text-light text-justify">
                    <div class="row py-4">
                        <div class="col-md-12" style="z-index: 999;">
                        <h3 style="text-align: center;">BISA KASIR V1</h3>
                        <hr style="border: 1px solid white; width: 100%; left:1px;">
                            <p>
                                Bisa kasir merupakan aplikasi Kasir Toko yang mudah atau user friendly dan mempunyai fitur yang cukup lengkap.
                            </p>
                            <p>
                                Kami memberikan biaya yang terjangkau untuk membantu anda dalam pengelolaan kasir, seperti pencatatan transaksi pembelanjaan barang, penjualan, sampai dengan arus kas.
                            </p>
                            <!-- Add more article content as needed -->
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="jquery-3.5.1.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        const tgl=new Date();
        const tahun=tgl.getFullYear();
        document.querySelector("#tahun").innerHTML=tahun;
    </script>
</body>
</html>
