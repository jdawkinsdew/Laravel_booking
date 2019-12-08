<?php

use Illuminate\Database\Seeder;
use App\Model\Blockdays;
class BlockdaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blockdays::insert([
         ['provider_id' => 1,
         'date'=>'2018-08-27',
         'reason'=>'rest',
        ],
         ['provider_id' => 2,
         'name'=>'2018-08-21',
         'reason'=>'rest',],
         ['provider_id' => 1,
         'name'=>'2018-08-23',
         'reason'=>'rest',],
         ['provider_id' => 3,
         'name'=>'2018-08-13',
         'reason'=>'working',],
         ['provider_id' => 2,
         'name'=>'2018-08-17',
         'reason'=>'rest',],
     ]); 
    }
}
