<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KunjunganResource\Pages;
use App\Filament\Admin\Resources\KunjunganResource\RelationManagers;
use App\Models\Kunjungan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KunjunganResource extends Resource
{
    protected static ?string $model = Kunjungan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pasien_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jadwal_praktek_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_kunjungan')
                    ->required(),
                Forms\Components\Textarea::make('keluhan')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('diagnosa')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('status_kunjungan')
                    ->required(),
                Forms\Components\TextInput::make('nomor_antrian')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('jam_datang'),
                Forms\Components\TextInput::make('jam_selesai'),
                Forms\Components\Textarea::make('catatan_tambahan')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pasien_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jadwal_praktek_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_kunjungan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_kunjungan'),
                Tables\Columns\TextColumn::make('nomor_antrian')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_datang'),
                Tables\Columns\TextColumn::make('jam_selesai'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKunjungans::route('/'),
            'create' => Pages\CreateKunjungan::route('/create'),
            'edit' => Pages\EditKunjungan::route('/{record}/edit'),
        ];
    }
}
