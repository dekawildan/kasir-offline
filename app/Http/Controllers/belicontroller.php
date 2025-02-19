<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\belimodel;
use App\Models\barangmodel;
use App\Models\suppliermodel;
use App\Models\tokomodel;
use App\Models\jualmodel;

class belicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$beli=belimodel::all();
        $beli=DB::select("SELECT tbl_barang.*,tbl_supplier.*,tbl_beli_barang.* FROM tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id");
        $barang=barangmodel::all();
        $supplier=suppliermodel::all();
        $totalstok=DB::select("SELECT * FROM tbl_total_stok");
        return view('admin.beli', compact('beli','barang','supplier','totalstok'));
    }

    public function apibeli()
    {
        $beli=DB::select("SELECT tbl_barang.*,tbl_supplier.*,tbl_beli_barang.* FROM tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id");
        return response()->json($beli);
    }

    public function apibarang()
    {
        $barang=barangmodel::all();
        return response()->json($barang);
    }

    public function apisupplier()
    {
        $supplier=suppliermodel::all();
        return response()->json($supplier);
    }

    public function apipenjualan()
    {
        $jual=DB::select("SELECT tbl_customer.*,tbl_karyawan.*,tbl_penjualan.*,tbl_barang.*,tbl_beli_barang.*,tbl_detail_jual.* FROM tbl_customer,tbl_karyawan,tbl_penjualan,tbl_barang,tbl_beli_barang,tbl_detail_jual WHERE tbl_customer.customer_id=tbl_penjualan.customer_id AND tbl_karyawan.karyawan_id=tbl_penjualan.karyawan_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_penjualan.nota_jual=tbl_detail_jual.nota_jual AND tbl_beli_barang.barang_kode=tbl_detail_jual.barang_kode");
        return response()->json($jual);
    }

    public function laporanbeli()
    {
        $unsesiawal=session()->forget('beliawal');
        $unsesiakhir=session()->forget('beliakhir');
        return view('admin.laporanbeli');
    }

    public function proseslaporan(Request $request)
    {
            if(empty($request->tglawal) || empty($request->tglakhir)) {
                return redirect('laporanbeli')->with('pesan','Form wajib diisi');
            } else {
                $beliawal=session()->put('beliawal',$request->tglawal);
                $beliakhir=session()->put('beliakhir',$request->tglakhir);
                $laporan=DB::select("SELECT tbl_kategori.*,tbl_barang.*,tbl_supplier.*,tbl_beli_barang.* FROM tbl_kategori,tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_beli_barang.tanggal_beli BETWEEN '$request->tglawal' AND '$request->tglakhir'");
                return view('admin.prosesbeli', compact('laporan'));
            }
    }

    public function cetakbeli()
    {
        $toko = tokomodel::first()->get();
        $sesiawal=session()->get('beliawal');
        $sesiakhir=session()->get('beliakhir');
        $cetaklaporan=DB::select("SELECT tbl_kategori.*,tbl_barang.*,tbl_supplier.*,tbl_beli_barang.* FROM tbl_kategori,tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_beli_barang.tanggal_beli BETWEEN '$sesiawal' AND '$sesiakhir'");
        $totalbelanja=DB::select("SELECT sum(tbl_beli_barang.total_beli) as total FROM tbl_kategori,tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_kategori.kategori_id=tbl_barang.kategori_id AND tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_beli_barang.tanggal_beli BETWEEN '$sesiawal' AND '$sesiakhir'");
        return view("admin.cetakbeli", compact("cetaklaporan","totalbelanja","toko"));
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        //$beli=belimodel::where('nota_beli','LIKE','%'.$cari.'%','OR','barang_nama','LIKE','%'.$cari.'%')->get();
        $beli=DB::select("SELECT tbl_barang.*,tbl_supplier.*,tbl_beli_barang.* FROM tbl_barang,tbl_supplier,tbl_beli_barang WHERE tbl_barang.barang_kode=tbl_beli_barang.barang_kode AND tbl_supplier.supplier_id=tbl_beli_barang.supplier_id AND tbl_barang.barang_nama LIKE '%$cari%' OR tbl_beli_barang.nota_beli LIKE '%$cari%'");
        $barang=barangmodel::all();
        $supplier=suppliermodel::all();
        $totalstok=DB::select("SELECT * FROM tbl_total_stok");
        return view('admin.beli', compact('beli','barang','supplier','totalstok'));
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
        if(empty($request->nota_beli) || empty($request->barang_kode) || empty($request->supplier_id) || empty($request->tanggal_beli) || empty($request->jumlah_barang) || empty($request->satuan) || empty($request->jumlah_stok) || empty($request->harga_beli) || empty($request->total_beli) || empty($request->harga_jual) || empty($request->tanggal_expired) || $request->jumlah_barang == 0 || $request->total_beli == 0 || $request->jumlah_stok == 0 || $request->harga_beli == 0 || $request->harga_jual == 0) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                belimodel::create([
                    'nota_beli' => $request->nota_beli,
                    'barang_kode' => $request->barang_kode,
                    'supplier_id' => $request->supplier_id,
                    'tanggal_beli' => $request->tanggal_beli,
                    'jumlah_stok' => $request->jumlah_stok,
                    'jumlah_barang' => $request->jumlah_barang,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'satuan' => $request->satuan,
                    'total_beli' => $request->total_beli,
                    'tanggal_expired' => $request->tanggal_expired
                ]);
                return redirect()->back()->with('pesan','Data stok barang telah ditambahkan');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal, pastikan barang dan supplier tersedia');
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
        if(empty($request->nota_beli) || empty($request->barang_kode) || empty($request->supplier_id) || empty($request->tanggal_beli) || empty($request->jumlah_barang) || empty($request->satuan) || empty($request->jumlah_stok) || empty($request->harga_beli) || empty($request->total_beli) || empty($request->harga_jual) || empty($request->tanggal_expired) || $request->jumlah_barang == 0 || $request->total_beli == 0 || $request->jumlah_stok == 0 || $request->harga_beli == 0 || $request->harga_jual == 0) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                belimodel::find($id)->update([
                    'nota_beli' => $request->nota_beli,
                    'barang_kode' => $request->barang_kode,
                    'supplier_id' => $request->supplier_id,
                    'tanggal_beli' => $request->tanggal_beli,
                    'jumlah_stok' => $request->jumlah_stok,
                    'jumlah_barang' => $request->jumlah_barang,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'satuan' => $request->satuan,
                    'total_beli' => $request->total_beli,
                    'tanggal_expired' => $request->tanggal_expired
                ]);
                return redirect()->back()->with('pesan','Data stok barang telah diedit');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal, pastikan barang dan supplier tersedia');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            belimodel::find($id)->delete();
            return redirect()->back()->with('pesan','Pembelian telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('pesan','Gagal menghapus, pastikan data tidak dipakai di transaksi');
        }
    }
}
