<?php

use App\User;
use App\Role;
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
         App\User::create([
            'firstname'=>'kainath',
            'lastname'=>'fatema',
            'role'=>'admin',
            'number'=>'01921470048',
            'email'=>'kfsinthy@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
    }
        
       
}