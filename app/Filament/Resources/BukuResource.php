<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Card::make()
                ->schema([
                    Forms\Components\TextInput::make('judul')
                    ->label('Judul Buku')
                    ->placeholder('Masukan Judu Buku')
                    ->required(),

                    Forms\Components\TextInput::make('pengarang')
                    ->label('Nama Pengarang')
                    ->placeholder('Masukan Nama Pengarang buku')
                    ->required(),

                    Forms\Components\TextInput::make('penerbit')
                    ->label('Penerbit')
                    ->placeholder('Masukan Nama Penerbit')
                    ->required(),

                    Forms\Components\TextInput::make('tahun_terbit')
                    ->label('Tahun Terbit')
                    ->placeholder('Masukan Tahun Terbit')
                    ->required(),

                    Forms\Components\TextInput::make('jumlah_buku')
                    ->label('Jumlah Buku')
                    ->placeholder('Masukan Jumlah Buku')

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('judul')->label('Judul Buku')->searchable(),
                Tables\Columns\TextColumn::make('pengarang')->label('Pengarang'),
                Tables\Columns\TextColumn::make('penerbit')->label('Penerbit'),
                Tables\Columns\TextColumn::make('tahun_terbit')->label('Tahun Terbit'),
                Tables\Columns\TextColumn::make('jumlah_buku')->label('Jumlah Buku'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
