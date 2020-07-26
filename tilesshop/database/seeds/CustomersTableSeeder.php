<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Customer::create([
        	'first_name'=>'Kainath',
        	'last_name'=>'simi',
        	'contact'=>'01770875563',
        	'email'=>'kfsinthy@gmail.com'
        ]);
    }
}
