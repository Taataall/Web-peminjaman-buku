<?php

namespace App\Filament\Admin\Resources\Loans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LoanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Anggota')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('book_id')
                    ->label('Buku')
                    ->relationship('book', 'title')
                    ->required(),
                DatePicker::make('loan_date')
                    ->label('Tanggal Pinjam')
                    ->required(),
                DatePicker::make('due_date')
                    ->label('Batas Pengembalian')
                    ->required(),
                DatePicker::make('returned_at')
                    ->label('Tanggal Kembali'),
                TextInput::make('status')
                    ->label('Status')
                    ->required()
                    ->default('dipinjam'),
                TextInput::make('fine')
                    ->label('Denda (Rp)')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
