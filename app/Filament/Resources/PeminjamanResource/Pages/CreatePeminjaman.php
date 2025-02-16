<?php

namespace App\Filament\Resources\PeminjamanResource\Pages;

use App\Filament\Resources\PeminjamanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePeminjaman extends CreateRecord
{
    protected static string $resource = PeminjamanResource::class;
    protected function afterCreate(): void
    {
        $peminjaman = $this->record;
        $buku = $peminjaman->buku;

        // Kurangi stok buku berdasarkan jumlah yang dipinjam
        if ($buku->stok >= $peminjaman->quantity) {
            $buku->stok -= $peminjaman->quantity;
            $buku->save();
        } else {
            // Batalkan transaksi jika stok tidak mencukupi
            throw ValidationException::withMessages(['quantity' => 'Stok buku tidak mencukupi!']);
        }
    }
}
