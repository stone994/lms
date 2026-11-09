
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin@12345'),
            ]
        );
        $user = User::firstOrCreate(
            ['email' => 'teacher@gmail.com'],
            [
                'name' => 'Teacher',
                'password' => Hash::make('Teacher@12345'),
            ]
        );
        $user = User::firstOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student',
                'password' => Hash::make('Student@12345'),
            ]
        );

        $user->assignRole('admin');
         $user->assignRole('teacher');
          $user->assignRole('student');
    }
}
