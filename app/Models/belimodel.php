<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class belimodel extends Model
{
    use HasFactory;

    protected $table='tbl_beli_barang';
    protected $fillable=[
        'nota_beli',
        'barang_kode',
        'supplier_id',
        'tanggal_beli',
        'jumlah_stok',
        'jumlah_barang',
        'harga_beli',
        'harga_jual',
        'satuan',
        'total_beli',
        'tanggal_expired'
    ];
    protected $primaryKey='id_beli';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_barang()
    {
        return $this->belongsTo('App\Models\barangmodel','barang_kode');
    }

    public function ke_supplier()
    {
        return $this->belongsTo('App\Models\suppliermodel','supplier_id');
    }

    public function ke_detail()
    {
        return $this->hasMany('App\Models\detailmodel','barang_kode');
    }
}
