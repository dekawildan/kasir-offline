<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jualmodel extends Model
{
    use HasFactory;

    protected $table='tbl_penjualan';
    protected $fillable=[
        'nota_jual',
        'karyawan_id',
        'tanggal_jual',
        'customer_id'
    ];
    protected $primaryKey='nota_jual';
    public $incrementing=false;
    public $timestamps=false;

    public function ke_detail()
    {
        return $this->hasMany('App\Models\detailmodel','nota_jual');
    }

    public function ke_customer()
    {
        return $this->belongsTo('App\Models\customermodel','customer_id');
    }

    public function ke_karyawan()
    {
        return $this->belongsTo('App\Models\karyawanmodel','karyawan_id');
    }
}
