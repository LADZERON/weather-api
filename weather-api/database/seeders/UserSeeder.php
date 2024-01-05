<?php

namespace Database\Seeders;

use App\Enums\BaseRoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            User::NAME_ATTRIBUTE => 'Тестовий',
            User::EMAIL_ATTRIBUTE => 'demo@demo.com',
            User::PASSWORD_ATTRIBUTE => bcrypt('password'),
        ]);

        $user->assignRole(BaseRoleEnum::ADMIN->value);
        $user->save();
    }
}
