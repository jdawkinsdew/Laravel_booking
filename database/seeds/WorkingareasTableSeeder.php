<?php

use Illuminate\Database\Seeder;
use App\Model\Workingarea;
class WorkingareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     Workingarea::insert([
         ['provider_id' => 1,
         'name'=>'beijing',
         'zip_code'=>'156-343',
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
