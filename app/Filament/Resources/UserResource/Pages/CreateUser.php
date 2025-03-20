<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Enums\Role;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
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

}
