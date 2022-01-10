<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Todos;
use App\Models\File_uploads;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user'
        ]);

        Todos::create([
            'message'=> 'Go to Market',
            'is_complete'=> 0,
            'user_id'=> 1,
        ]);
        Todos::create([
            'message'=> 'Go to Mosque',
            'is_complete'=> 0,
            'user_id'=> 2
        ]);
        File_uploads::create([
            'path'=> 'todos-images/0m4wg0KdVerR2ge8v8Bc7foZYBYAMqziTtBtFiKh.jpg',
            'name'=> 'Vegetables',
            'extension'=> 'jpg',
            'size'=> '10240',
        ]);
    }
}
