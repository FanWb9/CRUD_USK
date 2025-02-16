<?php

namespace App\Filament\Resources\PeminjamanResource\Pages;

use App\Filament\Resources\PeminjamanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Buku;
use Illuminate\Validation\ValidationException;

class EditPeminjaman extends EditRecord
{
    protected static string $resource = PeminjamanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $buku = Buku::find($data['buku_id']);
        if ($buku->stok > 0) {
            $buku->decrement('stok');
        } else {
            throw ValidationException::withMessages(['buku_id' => 'Stok buku habis']);
    }
        return $data;
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $peminjaman = $this->record;
        if ($data['tanggal_kembali'] && !$peminjaman->tanggal_kembali) {
                Buku::find($peminjaman->buku_id)->increment('stok');
            }
            return $data;
        }
    
        protected function afterUpdate(): void
        {
            $buku = Buku::find($peminjaman->buku_id);
            $buku->stok += $peminjaman->quantity;
            $buku->stok += $peminjaman->quantity;
            $buku->stok += $peminjaman->quantity;
            $buku = $peminjaman->buku;
            $buku->stok += $peminjaman->quantiy;
            $buku->save();
        }
    }



