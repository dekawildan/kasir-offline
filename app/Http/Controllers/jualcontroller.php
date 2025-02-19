<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\jualmodel;
use App\Models\detailmodel;
use App\Models\customermodel;
use App\Models\User;
use App\Models\tokomodel;

class jualcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tgl_skr=date('Y-m-d');
        $jual=DB::select("SELECT * FROM tbl_customer,tbl_penjualan WHERE tbl_customer.customer_id=tbl_penjualan.customer_id AND tanggal_jual='$tgl_skr'");
        $member=customermodel::all();
        $nota=date("Ymdis").mt_rand(100,999);
        
        return view('admin.jual', compact('nota','member','jual'));
    }

    public function proseslaporan(Request $request)
    {
        if(empty($request->tglawal) || empty($request->tglakhir)) {
            return redirect('laporanjual')->with('pesan','Form wajib diisi');
        } else {
            $jualawal=session()->put('jualawal',$request->tglawal);
            $jualakhir=session()->put('jualakhir',$request->tglakhir);

            $laporan=DB::select("SELECT tbl_barang.*,tbl_customer.*,tbl_penjualan.*,tbl_detail_jual.* FROM tbl_barang,tbl_customer,tbl_penjualan,tbl_detail_jual WHERE tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_penjualan.tanggal_jual BETWEEN '$request->tglawal' AND '$request->tglakhir'");
            return view('admin.prosesjual', compact('laporan'));
        }
    }

    public function laporanjual()
    {
        $unsesiawal=session()->forget('jualawal');
        $unsesiakhir=session()->forget('jualakhir');
        return view('admin.laporanjual');
    }

    public function cetakjual()
    {
        $toko = tokomodel::first()->get();
        $sesiawal=session()->get('jualawal');
        $sesiakhir=session()->get('jualakhir');

        $hrgjual=DB::select("SELECT * FROM tbl_beli_barang GROUP BY barang_kode");
        $cetaklaporan=DB::select("SELECT tbl_barang.*,tbl_customer.*,tbl_penjualan.*,tbl_detail_jual.* FROM tbl_barang,tbl_customer,tbl_penjualan,tbl_detail_jual WHERE tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_penjualan.tanggal_jual BETWEEN '$sesiawal' AND '$sesiakhir'");
        $totalomzet=DB::select("SELECT sum(tbl_detail_jual.total_bayar) as total FROM tbl_penjualan,tbl_detail_jual WHERE tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_penjualan.tanggal_jual BETWEEN '$sesiawal' AND '$sesiakhir'");
        return view("admin.cetakjual", compact("cetaklaporan","totalomzet","toko","hrgjual"));
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
        if(empty($request->no_nota) || empty($request->customer_id)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                $member=explode("-",$request->customer_id);
                jualmodel::create([
                    'nota_jual'=> $request->no_nota,
                    'karyawan_id'=> Auth::user()->karyawan_id,
                    'tanggal_jual' => date('Y-m-d'),
                    'customer_id'=> $member[0]
                ]);
                $sesi1 = session()->put('nota',$request->no_nota);
                $sesi2 = session()->put('customer', $member[1]);
                return redirect('detail');
            } catch (\Throwable $th) {
                return redirect()->back()->with('pesan','Gagal');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $hapusjual=jualmodel::findOrFail($id);
        $nota=$request->nota_jual;
        $hapusdetail=detailmodel::where('nota_jual','=',$nota);
        try {
            $hapusdetail->delete();
            $hapusjual->delete();
            return redirect()->back()->with('pesan','Nomor Nota telah dihapus');
        } catch(\Throwable $e) {
            return redirect()->back()->with('pesan','Nomor Nota gagal dihapus');
        }
        
    }
}
