<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\barangmodel;
use App\Models\kategorimodel;

class barangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang=barangmodel::all();
        $kategori=kategorimodel::all();
        $id=date('Ydi').mt_rand(100,9999);
        return view('admin.barang', compact('barang','id','kategori'));
    }

    public function cetak()
    {
        $barang=barangmodel::all();
        return view('admin.barcode', compact('barang'));
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        $barang=barangmodel::where('barang_nama','LIKE','%'.$cari.'%')->get();
        $kategori=kategorimodel::all();
        $id=date('Ydi').mt_rand(100,9999);
        return view('admin.barang', compact('kategori','id','barang'));
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
        if(empty($request->barang_kode) || empty($request->katalog_id) || empty($request->barang_nama) || empty($request->file('barang_file'))) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            $foto= $request->file('barang_file')->getClientOriginalName();
            $filebaru=date('Ydi').$foto;
            $folder='foto/';
            if($request->file('barang_file')->move($folder, $filebaru)) {
            try {
                barangmodel::create([
                    'barang_kode'=> $request->barang_kode,
                    'barang_nama'=> addslashes($request->barang_nama),
                    'barang_file'=> addslashes($filebaru),
                    'kategori_id'=> $request->katalog_id
                ]);
                return redirect()->back()->with('pesan','Barang telah ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->back()->with('pesan','Gagal menambahkan, pastikan kategori tersedia');
            }
        } else {
            return redirect()->back()->with('pesan','Gagal mengupload foto');
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
        if(empty($request->barang_kode) || empty($request->kategori_id) || empty($request->barang_nama) || empty($request->file('barang_file'))) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            $foto= $request->file('barang_file')->getClientOriginalName();
            $filebaru=date('Ydi').$foto;
            $folder='foto/';
            if($request->file('barang_file')->move($folder, $filebaru)) {
            try {
                barangmodel::find($id)->update([
                    'barang_kode'=> $request->barang_kode,
                    'barang_nama'=> addslashes($request->barang_nama),
                    'barang_file'=> addslashes($filebaru),
                    'kategori_id'=> $request->kategori_id
                ]);
                return redirect()->back()->with('pesan','Barang telah diubah');
            } catch (\Throwable $th) {
                return redirect()->back()->with('pesan','Gagal mengedit, pastikan kategori tersedia');
            }
        } else {
            return redirect()->back()->with('pesan','Gagal mengupload foto');
        }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $barang =barangmodel::find($id);
            $barang->delete();
            return redirect()->back()->with('pesan','Barang telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('pesan','Gagal, Barang masih dijadikan transaksi');
        }
    }
}
