<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmodel extends Model
{
    use HasFactory;

    protected $table='tbl_barang';
    protected $fillable=[
        'barang_kode',
        'barang_nama',
        'barang_file',
        'kategori_id'
    ];
    protected $primaryKey='barang_id';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_kategori()
    {
        return $this->belongsTo('App\Models\kategorimodel','kategori_id');
    }

    public function ke_beli()
    {
        return $this->hasMany('App\Models\belimodel','barang_kode');
    }
}
