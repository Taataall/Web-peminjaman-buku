<?php

namespace App\Filament\Admin\Resources\Books\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Buku')
                    ->required(),
                TextInput::make('author')
                    ->label('Penulis')
                    ->required(),
                TextInput::make('publisher')
                    ->label('Penerbit')
                    ->required(),
                TextInput::make('year')
                    ->label('Tahun Terbit')
                    ->required()
                    ->numeric(),
                TextInput::make('stock')
                    ->label('Stok')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
