<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\barangmodel;
use App\Models\belimodel;
use App\Models\customermodel;
use App\Models\detailmodel;
use App\Models\jualmodel;
use App\Models\kategorimodel;
use App\Models\suppliermodel;

class akuncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akun=User::all();
        $idadmin=date('Ymdhis').rand(1,9);
        return view('admin.admin', compact('akun','idadmin'));
    }

    public function panduan()
    {
        return view('admin.panduan');
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        $akun=User::where('karyawan_nama','LIKE','%'.$cari.'%')->get();
        $idadmin=date('Ymdhis').rand(1,9);
        return view('admin.admin', compact('akun','idadmin'));
    }

    public function dashboard()
    {
        date_default_timezone_set('Asia/Jakarta');
        $akun=User::all();
        $barang=barangmodel::all();
        $kategori=kategorimodel::all();
        $supplier=suppliermodel::all();
        $customer=customermodel::all();
        $beli=belimodel::all();
        $jual=DB::select("SELECT * FROM tbl_penjualan,tbl_detail_jual WHERE tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual GROUP BY tbl_detail_jual.nota_jual");
        $detail=detailmodel::sum('jumlah_jual');
        $bulanini=date('m');
        $thn=date('Y');
        $hari=date('d');

        $totalmodalbulanini=DB::table('tbl_beli_barang')->whereMonth('tanggal_beli','=',$bulanini)->sum('total_beli');
        $totalmodal=DB::table('tbl_beli_barang')->whereYear('tanggal_beli','=',$thn)->sum('total_beli');
        $omzetbulanini=DB::table('tbl_penjualan')->join('tbl_detail_jual','tbl_penjualan.nota_jual','=','tbl_detail_jual.nota_jual')->whereMonth('tbl_penjualan.tanggal_jual','=',$bulanini)->sum('total_bayar');
        $totalomzet=DB::table('tbl_penjualan')->join('tbl_detail_jual','tbl_penjualan.nota_jual','=','tbl_detail_jual.nota_jual')->whereYear('tbl_penjualan.tanggal_jual','=',$thn)->sum('total_bayar');
        $lababulanini=$omzetbulanini-$totalmodalbulanini;
        $totalstok=DB::table('tbl_total_stok')->sum('total_stok');
        $penjualanhariini=DB::table('tbl_penjualan')->whereDay('tanggal_jual','=',$hari)->get();
        $pembelianhariini=DB::table('tbl_beli_barang')->whereDay('tanggal_beli','=',$hari)->get();

        $barangpopuler=DB::select("SELECT tbl_barang.barang_nama,tbl_detail_jual.* FROM tbl_barang,tbl_detail_jual WHERE tbl_barang.barang_kode=tbl_detail_jual.barang_kode GROUP BY tbl_detail_jual.barang_kode");
        $jmlterjual=DB::select("SELECT sum(jumlah_jual) AS jml_jual FROM tbl_barang,tbl_detail_jual WHERE tbl_barang.barang_kode=tbl_detail_jual.barang_kode GROUP BY tbl_detail_jual.barang_kode");

        return view('admin.dashboard', compact('akun','barang','kategori','supplier','customer','beli','jual','detail','totalmodal','totalmodalbulanini','omzetbulanini','totalomzet','lababulanini','totalstok','pembelianhariini','penjualanhariini','barangpopuler','jmlterjual'));
    }

    public function backupdatabase()
    {
        return view('admin.backup');
    }

    public function prosesbackup()
    {
        try {
            $unsesibackup=session()->forget('dbfile');
            $filedb="backup-db-".date('d-m-Y').".sql";
            //linux
            exec("/./opt/lampp/bin/mysqldump -u root kasir_toko -R -E > /opt/lampp/htdocs/kasir-v1/public/db-backup/$filedb");
            //windows
            //exec("C:/xampp/mysql/bin/mysqldump.exe -u root kasir_toko -R -E > C:/xampp/htdocs/kasir-v1/public/db-backup/$filedb");
            $sesibackup=session()->put('dbfile',$filedb);
            return redirect('backupdatabase')->with('pesan','Berhasil Membackup database');
             } catch(\Throwable $e) {
            return redirect('backupdatabase')->with('pesan','Gagal Membackup database');
             }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(empty($request->karyawan_id) || empty($request->karyawan_nama) || empty($request->karyawan_tempat_lahir) || empty($request->karyawan_tanggal_lahir) || empty($request->karyawan_jenis) || empty($request->karyawan_alamat) || empty($request->karyawan_hp) || empty($request->karyawan_level) || empty($request->karyawan_email) || empty($request->karyawan_password)) {
            return redirect('admin')->with('pesan','Form wajib diisi');
        } else if($request->karyawan_password != $request->password2) {
            return redirect('admin')->with('pesan','Password tidak sama');
        } else {
            try {
                User::create([
'karyawan_id' => $request->karyawan_id,
'karyawan_nama' => addslashes($request->karyawan_nama),
'karyawan_tempat_lahir' => addslashes($request->karyawan_tempat_lahir),
'karyawan_tanggal_lahir' => $request->karyawan_tanggal_lahir,
'karyawan_jenis' => $request->karyawan_jenis,
'karyawan_alamat'=> addslashes($request->karyawan_alamat),
'karyawan_hp'=> addslashes($request->karyawan_hp),
'karyawan_status'=> 'AKTIF',
'karyawan_email'=> addslashes($request->karyawan_email),
'password'=> Hash::make($request->karyawan_password),
'karyawan_level'=> $request->karyawan_level,
                ]);
                return redirect('admin')->with('pesan','Data admin telah ditambahkan');
            } catch (\Throwable $th) {
                return redirect('admin')->with('pesan','Gagal menambahkan admin');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(empty($request->karyawan_nama) || empty($request->karyawan_tempat_lahir) || empty($request->karyawan_tanggal_lahir) || empty($request->karyawan_jenis) || empty($request->karyawan_alamat) || empty($request->karyawan_hp) || empty($request->karyawan_level) || empty($request->karyawan_email) || empty($request->karyawan_password)) {
            return redirect('admin')->with('pesan','Form wajib diisi');
        } else if($request->karyawan_password != $request->password2) {
            return redirect('admin')->with('pesan','Password tidak sama');
        } else {
            try {
                User::find($id)->update([
'karyawan_nama' => addslashes($request->karyawan_nama),
'karyawan_tempat_lahir' => addslashes($request->karyawan_tempat_lahir),
'karyawan_tanggal_lahir' => $request->karyawan_tanggal_lahir,
'karyawan_jenis' => $request->karyawan_jenis,
'karyawan_alamat'=> addslashes($request->karyawan_alamat),
'karyawan_hp'=> addslashes($request->karyawan_hp),
'karyawan_status'=> 'AKTIF',
'karyawan_email'=> addslashes($request->karyawan_email),
'password'=> Hash::make($request->karyawan_password),
'karyawan_level'=> $request->karyawan_level
                ]);
                return redirect('admin')->with('pesan','Data admin telah diedit');
            } catch (\Throwable $th) {
                return redirect('admin')->with('pesan','Gagal mengedit data admin');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $hapus = User::find($id);
            $hapus->delete();

            return redirect('admin')->with('pesan','Admin telah dihapus');
        } catch(\Throwable $e) {
            return redirect('admin')->with('pesan','Admin masih aktif di pelayanan transaksi');
        }
    }

    public function login()
    {
        if(Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('admin.login');
        }
    }

    public function logout()
    {
        if(!empty(session()->get('nota')) || !empty(session()->get('customer'))) {
            return redirect('detail')->with('pesan','Selesaikan transaksi');
        } else {
        $beliawal=session()->forget('beliawal');
        $beliakhir=session()->forget('beliakhir');
        $jualawal=session()->forget('jualawal');
        $jualakhir=session()->forget('jualakhir');
        Auth::logout();
        return redirect('login');
        }
    }

    public function proseslogin(Request $request)
    {
        if(empty($request->email) || empty($request->password)) {
           return redirect('login')->with('pesan','Form wajib diisi'); 
        } else {
            $data=[
                'karyawan_email' => $request->email,
                'password' => $request->password
            ];
            Auth::attempt($data);
            if(Auth::check()) {
                return redirect('dashboard');
            } else {
                return redirect('login')->with('pesan','Akun tidak terdaftar');
            }
        }
    }
}
