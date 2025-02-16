<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeminjamanResource\Pages;
use App\Models\Peminjaman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Select::make('siswa_id')
                            ->relationship('siswa', 'nama')
                            ->required(),
                        Select::make('buku_id')
                            ->relationship('buku', 'judul')
                            ->required(),
                        Forms\Components\TextInput::make('quantity')->numeric()->minValue(1)->required(),    
                        DatePicker::make('tanggal_pinjam')->required()->default(now()),
                        DatePicker::make('tanggal_kembali'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('siswa.nama')->sortable(),
                TextColumn::make('buku.judul')->sortable(),
                Textcolumn::make('quantity')->sortable(),
                TextColumn::make('tanggal_pinjam')->sortable(),
                TextColumn::make('tanggal_kembali')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
