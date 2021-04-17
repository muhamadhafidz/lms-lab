<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'npm' => Str::random(8),
            'nama' => Str::random(10),
            'kelas_id' => 1,
            'email' => Str::random(8).'@gmail.com',
            'no_telp' => Str::random(8),
            'password' => Hash::make('password'),
            'roles' => 'asisten',
            'active' => 'y',
        ]);
    }
}
