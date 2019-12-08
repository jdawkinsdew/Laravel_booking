<?php

use Illuminate\Database\Seeder;
use App\Model\Booking;
class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Booking::insert([
            ['provider_id'=>'1',
             'client'=>'Smith',
             'service'=>'electronic',
             'start'=>'2018-08-17 16:00:00',
             'end'=>'2018-08-20 16:00:00',
             'price'=>'100$',
             'promotion_code'=>'+467068977339',
             'discount'=>'10%',
             'status' =>'pending',
            ],
            ['provider_id'=>'2',
             'client'=>'',
             'service'=>'electronic',
             'start'=>'2018-08-12 19:30:00',
             'end'=>'2018-08-15',
             'price'=>'100$',
             'promotion_code'=>'+46709101770',
             'discount'=>'15%',
             'status' =>'pending',],
            ['provider_id'=>'3',
             'client'=>'',
             'service'=>'electronic',
             'start'=>'2018-08-27 22:10:00',
             'end'=>'2018-08-07 23:30:00',
             'price'=>'120$',
             'promotion_code'=>'+467068957339',
             'discount'=>'20%',
             'status' =>'pending',
            ],
              ]);
    }
}
