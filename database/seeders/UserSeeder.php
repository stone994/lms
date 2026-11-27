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
<<<<<<< HEAD
                'role'=>'admin',
            ]
        );
        $user->syncRoles(['admin']);
=======
                'role' => 'admin',
            ]
        );
        $user->syncRoles(['admin']);

>>>>>>> 860f18a24a334d84c2963f7c3f0f60d7a59242fd
        $user = User::firstOrCreate(
            ['email' => 'teacher@gmail.com'],
            [
                'name' => 'Teacher',
                'password' => Hash::make('Teacher@12345'),
<<<<<<< HEAD
                'role'=>'teacher',
=======
                'role' => 'teacher',
>>>>>>> 860f18a24a334d84c2963f7c3f0f60d7a59242fd
            ]
        );
        $user->syncRoles(['teacher']);

        $user = User::firstOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Student',
                'password' => Hash::make('Student@12345'),
<<<<<<< HEAD
                'role'=>'student',
            ]
        );
        $user->syncRoles(['student']);

        $user->assignRole('admin');
         $user->assignRole('teacher');
          $user->assignRole('student');
=======
                'role' => 'student',
            ]
        );
        $user->syncRoles(['student']);
>>>>>>> 860f18a24a334d84c2963f7c3f0f60d7a59242fd
    }
}
