<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
        ]);
        $adminUser = User::find(1);
        $adminUser->roles()->attach([1]);

        DB::table('users')->insert([
            'name' => 'Normal',
            'email' => 'normal@normal.com',
            'password' => bcrypt('12345678'),
        ]);
        $normalUser = User::find(2);
        $normalUser->roles()->attach([2]);
    }
}
