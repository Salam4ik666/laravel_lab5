<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'AAdmin User',
            'email' => 'aadmin@example.com',
            'password' => bcrypt('adminn'),  // Зашифрованный пароль
            'role' => 'admin',
        ]);
    }
}
