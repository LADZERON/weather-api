<?php

namespace Database\Seeders;

use App\Enums\BaseRoleEnum;
use App\Enums\PermissionsEnum;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach (BaseRoleEnum::array() as $key => $role) {
            $roleModel = Role::create([
                Role::NAME_ATTRIBUTE => $key,
            ]);
            $roleModel->givePermissionTo(PermissionsEnum::$role());
        }
    }
}
