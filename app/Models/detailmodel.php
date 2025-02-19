<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailmodel extends Model
{
    use HasFactory;

    protected $table='tbl_detail_jual';
    protected $fillable=[
        'nota_jual',
        'barang_kode',
        'jumlah_jual',
        'diskon',
        'total_bayar'
    ];
    protected $primaryKey='detail_id';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_beli()
    {
        return $this->belongsTo('App\Models\belimodel','barang_kode');
    }

    public function ke_jual()
    {
        return $this->belongsTo('App\Models\jualmodel','nota_jual');
    }
}
