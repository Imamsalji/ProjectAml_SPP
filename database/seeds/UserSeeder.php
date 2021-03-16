<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'Agra Admin',   
        'level' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin')
        ]);

        User::create([
            'name' => 'Agra Petugas',   
            'level' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('petugas')
        ]);

        User::create([
            'name' => 'Agra Siswa',   
            'level' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => bcrypt('siswa')
        ]);
    }
}
