<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tokomodel extends Model
{
    use HasFactory;
    protected $table="tbl_toko";
    protected $fillable=["toko_nama","toko_alamat","toko_hp"];

    protected $primaryKey="toko_id";
    public $incrementing=true;
    public $timestamps=false;
}
