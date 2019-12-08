<?php

use Illuminate\Database\Seeder;
use App\Model\Availableservice;
class AvailableserviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Availableservice::insert([
         ['provider_id' => 1,
          'service_id'=>'2',
          ],
         ['provider_id' => 3,
          'service_id'=>'3',
        ],
         ['provider_id' => 2,
         'service_id'=>'4',
          ],
         ['provider_id' => 3,
         'service_id'=>'3',
          ],
         ['provider_id' => 1,
           'service_id'=>'2',
        ],
     ]);
    }
}
