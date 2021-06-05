<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tanggapan;

class Pengaduan extends Model
{
    use HasFactory;

    public function user()
    {
        //belongsTo(User::class, 'foreign_key', 'local_key');
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    public function tanggapan() {
        return $this->hasMany(Tanggapan::class, 'id_pengaduan', 'id');
    }
}
