<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    //
    use Hasfactory;
    protected $fillable = [
        'nama',
        'kelas',
        'nis',
    ];
    public function peminjaman(){
        return $this->hashMany(peminjaman::class);
    }
}
