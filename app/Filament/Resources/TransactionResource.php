<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder; // Pastikan use statement ini ada
use Illuminate\Support\HtmlString;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-s-rectangle-stack';

    // ==========================================================
    // ===== PERUBAHAN DITAMBAHKAN DI SINI (START) ==============
    // ==========================================================

    public static function getEloquentQuery(): Builder
    {
        /**
         * Method ini secara otomatis memfilter semua data pada resource ini
         * dan hanya akan menampilkan data transaksi yang kolom 'user_id'-nya
         * sama dengan ID pengguna yang sedang login.
         */
        return parent::getEloquentQuery()->where('user_id', auth()->id());
    }

    // ==========================================================
    // ===== PERUBAHAN DITAMBAHKAN DI SINI (END) ================
    // ==========================================================

    public static function form(Form $form): Form
    {
        // Bagian form tidak diubah
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')
                    // Saya melihat di file lain Anda menggunakan transaction_date, 
                    // pastikan ini konsisten. Jika nama kolom di DB adalah 'transaction_date', 
                    // maka seharusnya tidak ada masalah.
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\DatePicker::make('date_transaction') 
                    ->maxDate(now())
                    ->required(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                // Saya melihat di file lain Anda memiliki 'description', bukan 'note'.
                // Jika di database namanya 'description', ubah 'note' menjadi 'description'.
                Forms\Components\Textarea::make('note') 
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->nullable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Transaction')
                    ->extraHeaderAttributes(['style' => 'text-align: center !important;'])
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query
                            ->where('name', 'like', "%{$search}%")
                            ->orWhereHas('category', fn (Builder $query) =>
                                $query->where('name', 'like', "%{$search}%")
                            );
                    })
                    ->formatStateUsing(function ($state, Transaction $record) {
                        $iconName = optional($record->category)->icon ?? 'folder';
                        $transactionName = $record->name;
                        $categoryName = $state;

                        $iconHtml = "<span class='fi-icon-o-{$iconName} w-6 h-6 mr-3 text-gray-500 shrink-0'></span>";
                        $textHtml = "<div><strong>{$transactionName}</strong><br><small class='text-gray-500'>{$categoryName}</small></div>";

                        return new HtmlString("<div style='display: flex; align-items: center;'>{$iconHtml} {$textHtml}</div>");
                    }),
                
                // Di sini Anda menggunakan 'is_expense' dari kategori, ini sudah benar
                Tables\Columns\TextColumn::make('category.is_expense')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Expense' : 'Income')
                    ->color(fn (bool $state): string => $state ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->money('idr')
                    ->sortable()
                    ->color(fn (Transaction $record): string => optional($record->category)->is_expense ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('date_transaction')
                    ->label("Tanggal")
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}