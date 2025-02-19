<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tokomodel;

class tokocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko=tokomodel::all();
        return view('admin.toko', compact('toko'));
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
        //
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
        if(empty($request->toko_nama) || empty($request->toko_alamat) || empty($request->toko_hp)) {
            return redirect()->back()->with('pesan','Form wajib diisi');
        } else {
            try {
                tokomodel::find($id)->update([
                    'toko_nama' => addslashes($request->toko_nama),
                    'toko_alamat' => addslashes($request->toko_alamat),
                    'toko_hp' => addslashes($request->toko_hp)
                ]);
                return redirect()->back()->with('pesan','Data toko telah diedit');
            } catch (\Throwable $th) {
                return redirect()->back()->with('pesan','Gagal mengedit data toko');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
