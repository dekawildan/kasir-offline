<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorimodel extends Model
{
    use HasFactory;

    protected $table='tbl_kategori';
    protected $fillable=[
        'kategori_nama',
        'kategori_deskripsi'
    ];
    protected $primaryKey='kategori_id';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_barang()
    {
        return $this->hasMany('App\Models\barangmodel','kategori_id');
    }
}
