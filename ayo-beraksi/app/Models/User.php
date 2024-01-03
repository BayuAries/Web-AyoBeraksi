<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'no_telp',          // No Telepon
        'nip',              // NIP Pegawai
        'role_id',
        'device_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationship
    public function laporanPenyuapan()
    {
        return $this->hasMany('App\Models\LaporanPenyuapan');
    }

    public function laporanPegaduan()
    {
        return $this->hasMany('App\Models\LaporanPengaduaan');
    }

    public function laporanGratifikasi()
    {
        return $this->hasMany('App\Models\laporanGratifikasi');
    }

    public function feedback()
    {
        return $this->hasMany('App\Models\Feedback');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function timPemeriksaPenyuapan()
    {
        return $this->hasMany('App\Models\TimPemeriksaPenyuapan', 'id_anggota', 'id');
    }

    public function timPemeriksaPengaduan()
    {
        return $this->hasMany('App\Models\TimPemeriksaPengaduan', 'id_anggota', 'id');
    }

    public function timPemeriksaGratifikasi()
    {
        return $this->hasMany('App\Models\TimPemeriksaGratifikasi', 'id_anggota', 'id');
    }
}
