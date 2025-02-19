<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\customermodel;

class customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member=customermodel::all();
        return view('admin.customer', compact('member'));
    }

    public function cari(Request $request)
    {
        $cari=$request->caridata;
        $member=customermodel::where('customer_nama','LIKE','%'.$cari.'%')->get();
        return view('admin.customer', compact('member'));
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
        if(empty($request->customer_nama) || empty($request->tgl_daftar) || empty($request->nohp)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
            customermodel::create([
                'customer_nama' => addslashes($request->customer_nama),
                'tgl_daftar' => $request->tgl_daftar,
                'nohp' => addslashes($request->nohp),
                'customer_level' => $request->customer_level,
                'customer_status' => $request->customer_status
            ]);
                return redirect()->back()->with('pesan','Berhasil mendaftarkan member');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal menambahkan member');
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
        if(empty($request->customer_nama) || empty($request->tgl_daftar) || empty($request->nohp)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
            customermodel::find($id)->update([
                'customer_nama' => addslashes($request->customer_nama),
                'tgl_daftar' => $request->tgl_daftar,
                'nohp' => addslashes($request->nohp),
                'customer_level' => $request->customer_level,
                'customer_status' => $request->customer_status
            ]);
                return redirect()->back()->with('pesan','Berhasil mengubah member');
            } catch(\Throwable $e) {
                return redirect()->back()->with('pesan','Gagal mengubah member');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $member=customermodel::find($id);
            $member->delete();
            return redirect()->back()->with('pesan','Customer telah dihapus');
        } catch(\Throwable $e) {
            return redirect()->back()->with('pesan','Customer masih aktif di transaksi, atau nomor hp sudah terdaftar');
        }
    }
}
