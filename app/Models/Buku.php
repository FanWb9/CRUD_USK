<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    //
    use Hasfactory;
    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'jumlah_buku',
    ];
    public function peminjaman(){
        return $this->hasmany(peminjaman::class);
    }
}
