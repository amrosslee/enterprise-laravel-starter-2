<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $admin = User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'=> bcrypt('password'),
        ]);
        $admin->assignRole(Role::findByName(UserRole::Manager->value)->first());

        User::factory()->count(50)
            ->create()
            ->each(function ($user) {
                $user->assignRole(Role::findByName(Arr::random(UserRole::cases())));
            });
    }
}
