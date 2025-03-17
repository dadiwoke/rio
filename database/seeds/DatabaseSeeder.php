<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // Buat Akun User
        User::create([
            'name' => 'dadi',
            'email' => 'dadisuhar@gmail.com',
            'password' => bcrypt('112233'),

        ]);
    }
}
