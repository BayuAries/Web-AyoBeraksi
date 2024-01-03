<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';
    protected $fillable = [
        'id_pengguna',
        'nama_pengguna',
        'bintang_kepuasan',
        'respon_kepuasan',
        'alasan',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_pengguna', 'id');
    }
}
