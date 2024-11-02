<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    use WithoutModelEvents;
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        if (!$user) {
        $user = new User();
        }

        $user->username = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
