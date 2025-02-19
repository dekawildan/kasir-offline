<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customermodel extends Model
{
    use HasFactory;
    protected $table='tbl_customer';
    protected $fillable=[
        'customer_nama',
        'tgl_daftar',
        'nohp',
        'customer_level',
        'customer_status'
    ];
    protected $primaryKey='customer_id';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_jual()
    {
        return $this->hasMany('App\Models\jualmodel','customer_id');
    }
}
