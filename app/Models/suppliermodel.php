<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliermodel extends Model
{
    use HasFactory;

    protected $table='tbl_supplier';
    protected $fillable=[
        'supplier_nama',
        'supplier_alamat',
        'supplier_hp'
    ];
    protected $primaryKey='supplier_id';
    public $incrementing=true;
    public $timestamps=false;

    public function ke_beli()
    {
        return $this->hasMany('App\Models\belimodel','supplier_id');
    }
}
