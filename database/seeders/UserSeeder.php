<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt(12345678),
                'nickname' => 'Bapak',
                'whatsapp' => '087848114793',
                'role' => 'admin'
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
