<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (UserRole::cases() as $role) {
            $role === UserRole::Manager ?
                Role::create(['name' => $role->value, 'guard_name' => 'admin']) :
                Role::create(['name' => $role->value]);
        }
    }
}
