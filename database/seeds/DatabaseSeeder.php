<?php

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
        \App\User::create([
            'id' => 1,
            'name'	=> 'Gantengx',
            'email'	=> 'admin@gmail.com',
            'password'	=> bcrypt('admin')
    ]);

        \App\Role::create([
            'id' => 1,
            'name'	=> 'Admin',
            'code'	=> 'adm',
            'description'	=> 'Semua bisa!'
    ]);
        \App\Role::create([
            'id' => 2,
            'name'	=> 'Anggota',
            'code'	=> 'agt',
            'description'	=> 'Pembaca yang Handal!'
    ]);
        \App\Enrolment::create([
            'id' => 1,
            'users_id'	=> '1',
            'role_id'	=> '1',
    ]);
        // $this->call(UsersTableSeeder::class);
    }
}
