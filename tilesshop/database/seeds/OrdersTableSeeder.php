<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Order::create([
        	'order_name'=>'atc',
        	'quantity'=>2,
        	'price'=>100.50
        ]);
    }
}
