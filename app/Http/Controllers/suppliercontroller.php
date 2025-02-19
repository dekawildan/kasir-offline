<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\suppliermodel;

class suppliercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier=suppliermodel::all();
        return view("admin.supplier",compact("supplier"));
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        $supplier=suppliermodel::where('supplier_nama','LIKE','%'.$cari.'%')->get();
        return view('admin.supplier',compact('supplier'));
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
        if(empty($request->supplier_nama) || empty($request->supplier_alamat) || empty($request->supplier_hp)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                suppliermodel::create([
                    'supplier_nama' => addslashes($request->supplier_nama),
                    'supplier_alamat' => addslashes($request->supplier_alamat),
                    'supplier_hp' => addslashes($request->supplier_hp)
                ]);
                return redirect()->back()->with('pesan','Supplier berhasil ditambahkan');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal, mungkin supplier sudah tersedia');
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
         if(empty($request->supplier_nama) || empty($request->supplier_alamat) || empty($request->supplier_hp)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                suppliermodel::find($id)->update([
                    'supplier_nama' => addslashes($request->supplier_nama),
                    'supplier_alamat' => addslashes($request->supplier_alamat),
                    'supplier_hp' => addslashes($request->supplier_hp)
                ]);
                return redirect()->back()->with('pesan','Supplier berhasil diubah');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal, mungkin supplier sudah tersedia');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            suppliermodel::find($id)->delete();
            return redirect()->back()->with('pesan','Supplier telah dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('pesan','Gagal, mungkin supplier masih aktif di pembelian');
        }
    }
}
