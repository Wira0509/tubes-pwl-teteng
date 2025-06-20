<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;

    /**
     * Menambahkan user_id secara otomatis sebelum data dibuat.
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Mengambil id dari user yang sedang login dan menambahkannya ke data
        $data['user_id'] = auth()->id();
    
        return $data;
    }
}