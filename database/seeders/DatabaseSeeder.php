<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::Create(['name' => 'superadmin',]);
        $role1 = Role::Create(['name' => 'admin',]);
        $role2 = Role::Create(['name' => 'user',]);

        // // User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // ]);

        $user = User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' =>bcrypt('superadmin'),
        ]);
        $user1 = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>bcrypt('adminadmin'),
        ]);
        $user2 = User::factory()->create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' =>bcrypt('userruserr'),
        ]);

        $user->assignRole('superadmin');
        $user1->assignRole('admin');
        $user2->assignRole('user');
    }
}
