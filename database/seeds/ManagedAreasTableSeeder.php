<?php

use Illuminate\Database\Seeder;
use App\Model\Managed_Area;
class ManagedAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Managed_Area::insert([
         ['area' => 1,
         'zip_code'=>'beijing',
         'color'=>'156-343',
        ],
         ['provider_id' => 2,
         'name'=>'dandong',
         'zip_code'=>'156-343',
        ],
         ['provider_id' => 3,
         'name'=>'shanghai',
         'zip_code'=>'156-343',
        ],
         ['provider_id' => 3,
         'name'=>'norway',
         'zip_code'=>'156-343',
        ],
         ['provider_id' => 3,
         'name'=>'liaoning',
        'zip_code'=>'156-343',
        ],
     ]);
    }
}
