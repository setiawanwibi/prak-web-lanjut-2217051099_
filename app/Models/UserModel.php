<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';

    // Menjaga kolom 'id' agar tidak dapat diisi secara massal
    protected $guarded = ['id'];

    // Menentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto', // Kolom foto ditambahkan di sini
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    // Fungsi getUser yang telah diubah untuk menerima parameter $id
    public function getUser($id = null)
    {
        $query = $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')
            ->select('user.id', 'user.nama', 'user.npm', 'user.foto', 'kelas.nama_kelas as nama_kelas');

        // Jika parameter $id tidak null, tambahkan kondisi untuk filter berdasarkan id
        if ($id != null) {
            return $query->where('user.id', $id)->first(); // Mengambil satu data user berdasarkan id
        }

        // Jika tidak ada id yang diberikan, kembalikan semua data user
        return $query->get();
    }
}