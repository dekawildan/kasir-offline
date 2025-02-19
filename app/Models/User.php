<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='tbl_karyawan';
    protected $fillable=[
        'karyawan_id',
        'karyawan_nama',
        'karyawan_tempat_lahir',
        'karyawan_tanggal_lahir',
        'karyawan_jenis',
        'karyawan_alamat',
        'karyawan_hp',
        'karyawan_status',
        'karyawan_email',
        'password',
        'karyawan_level'
    ];
    protected $primaryKey='karyawan_id';
    public $incrementing=false;
    public $timestamps=false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
        //'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /*
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    */

    public function ke_jual()
    {
        return $this->hasMany('App\Models\jualmodel','karyawan_id');
    }
   
}
