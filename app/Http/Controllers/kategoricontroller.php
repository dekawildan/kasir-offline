<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\kategorimodel;

class kategoricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = kategorimodel::all();
        return view("admin.kategori", compact("kategori"));
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        $kategori=kategorimodel::where('kategori_nama','LIKE','%'.$cari.'%')->get();
        return view('admin.kategori', compact('kategori'));
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
        if(empty($request->kategori_nama) || empty($request->kategori_deskripsi)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                kategorimodel::create([
                    'kategori_nama' => addslashes($request->kategori_nama),
                    'kategori_deskripsi'=> addslashes($request->kategori_deskripsi)
                ]);
                return redirect('kategori')->with('pesan','Data kategori berhasil ditambahkan');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal menambahkan kategori');
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
        if(empty($request->kategori_nama) || empty($request->kategori_deskripsi)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                kategorimodel::find($id)->update([
                    'kategori_nama' => addslashes($request->kategori_nama),
                    'kategori_deskripsi'=> addslashes($request->kategori_deskripsi)
                ]);
                return redirect('kategori')->with('pesan','Data kategori berhasil diedit');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal mengedit kategori');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $hapus=kategorimodel::find($id);
            $hapus->delete();
            return redirect('kategori')->with('pesan','Kategori telah dihapus');
        } catch(\Throwable $e) {
            return redirect()->back()->with('pesan','Gagal, pastikan kategori sudah tidak dipakai barang');
        }
    }
}
