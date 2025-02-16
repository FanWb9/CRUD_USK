<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'siswa_id',
        'buku_id',
        'quantity',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
