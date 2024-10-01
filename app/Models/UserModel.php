<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Sesuaikan dengan nama tabel yang kamu gunakan di database
    protected $fillable = ['nama', 'npm', 'kelas_id']; // Kolom-kolom yang bisa diisi

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id'); // Relasi dengan model Kelas
    }
}
