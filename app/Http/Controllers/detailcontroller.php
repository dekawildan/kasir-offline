<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\belimodel;
use App\Models\jualmodel;
use App\Models\detailmodel;
use App\Models\barangmodel;
use App\Models\customermodel;
use App\Models\tokomodel;

class detailcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi=session()->get('nota');
        $detail = DB::select("SELECT tbl_barang.*,tbl_beli_barang.*,tbl_penjualan.*,tbl_detail_jual.* FROM tbl_barang,tbl_beli_barang,tbl_penjualan,tbl_detail_jual WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_detail_jual.nota_jual='$sesi' GROUP BY tbl_detail_jual.barang_kode");
        $total=DB::table('tbl_detail_jual')->where('nota_jual','=',session()->get('nota'))->sum('total_bayar');
        return view('admin.detail', compact('detail','total'));
    }

    public function cetakstruk($id)
    {
        $sesi1=session()->forget('nota');
        $sesi2=session()->forget('customer');
        $toko = tokomodel::first()->get();
        $jam=date('h:i:s');
        $jualmember=jualmodel::where('nota_jual','=',$id)->get();
        $nota=DB::select("SELECT tbl_barang.barang_nama,tbl_beli_barang.*,tbl_customer.*,tbl_penjualan.*,tbl_detail_jual.* FROM tbl_barang,tbl_beli_barang,tbl_customer,tbl_penjualan,tbl_detail_jual WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_beli_barang.barang_kode=tbl_detail_jual.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_detail_jual.nota_jual='$id' GROUP BY tbl_beli_barang.barang_kode");
        $total=DB::table('tbl_detail_jual')->where('nota_jual','=',$id)->sum('total_bayar');
        return view('admin.struk', compact('toko','nota','jualmember','total','jam'));
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
        if(empty(session()->get('nota')) || empty($request->caribarang)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            $cari=$request->caribarang;
            $data=belimodel::where('barang_kode', 'LIKE', $cari)->groupBy('barang_kode')->get();
            if(count($data) > 0) {
                try {
                    foreach($data as $d) {
                    $hrg=$d->harga_jual;
                    detailmodel::create([
                        'nota_jual' => session()->get('nota'),
                        'barang_kode' => $cari,
                        'jumlah_jual' => 1,
                        'diskon' => 0,
                        'total_bayar' => $hrg
                    ]);
                    return redirect()->back()->with('pesan','Penjualan Ditambahkan');
                    }
                } catch (\Throwable $th) {
                    return redirect()->back()->with('pesan','Gagal menambahkan penjualan');
                }
            } else {
                return redirect()->back()->with('pesan','Data tidak ditemukan');
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
        if(empty($request->jumlah_jual) || empty($request->total_bayar)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                detailmodel::findOrFail($id)->update([
                    'jumlah_jual' => $request->jumlah_jual,
                    'diskon' => $request->diskon,
                    'total_bayar' => $request->total_bayar
                ]);
                return redirect()->back()->with('pesan','Berhasil diedit');
            } catch (\Throwable $th) {
                return redirect()->back()->with('pesan','Gagal diedit');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $detail = detailmodel::find($id);
            $detail->delete();
            return redirect('detail')->with('pesan','Barang dihapus');
        } catch (\Throwable $th) {
            return redirect('detail')->with('pesan','Gagal menghapus');
        }
    }

    public function unsesi()
    {
        $sesi1=session()->forget('nota');
        $sesi2=session()->forget('customer');
        return redirect('jual');
    }
}
