<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (PermissionsEnum::values() as $permission) {
            Permissions::create([
                Permissions::NAME_ATTRIBUTE => $permission,
            ]);
        }
    }
}
