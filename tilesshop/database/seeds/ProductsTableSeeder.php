<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\product::create([
        	'product_name'=>'atc tiles',
        	'price'=>5000,
        	'status'=>'availabe'
        ]);
    }
}
