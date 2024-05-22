<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin','email' => 'admin@test.test','password'=> bcrypt('password')
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name' => 'User','email' => 'user@test.test','password'=> bcrypt('password')
        ]);
        $user->assignRole('User');
        // User::create([
        //     'name' => 'User','email' => 'user@test.test','password'=> bcrypt('password')
        // ])->assignRole('User');
    }
}
