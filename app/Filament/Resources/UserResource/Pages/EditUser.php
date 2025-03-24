<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\Role;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        $result = [];
        in_array(
            User::find(auth()->id())->role,
            [
                Role::Editor->value,
                Role::Root->value,
            ]
        ) ? $result += [
            Actions\DeleteAction::make(),
        ] : [];
        return $result;
    }
    protected function authorizeAccess(): void
    {
        abort_unless(
            in_array(
                User::find(auth()->id())->role,
                [
                    Role::Editor->value,
                    Role::Root->value,
                ]
            ), 403);
    }
    public function mount(int | string $record): void
    {
        $this->record = $this->resolveRecord($record);

        if( !($record==auth()->id()) ){
            $this->authorizeAccess();
        }

        $this->fillForm();
        $this->previousUrl = url()->previous();
    }
}
