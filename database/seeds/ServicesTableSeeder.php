<?php

use Illuminate\Database\Seeder;
use App\Model\Service;
class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
         ['name' => 'cleaning',
         'one_time' => '30$',
         'recurring'=>'20$',
        ],
        ['name' => 'electronic',
         'one_time' => '40$',
         'recurring'=>'30$',
        ],
        ['name' => 'farming',
         'one_time' => '30$',
         'recurring'=>'20$',
        ],
        ['name' => 'car',
         'one_time' => '35$',
         'recurring'=>'30$',
        ],
        ['name' => 'home',
         'one_time' => '32$',
         'recurring'=>'27$',
        ],
        ['name' => 'cleaning',
         'one_time' => '',
         'recurring'=>'sethsaren',
        ],
        ]);
    }
}
