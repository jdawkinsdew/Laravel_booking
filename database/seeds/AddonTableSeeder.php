<?php

use Illuminate\Database\Seeder;
use App\Model\AddonService;
class AddonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AddonService::insert([
        ['addService' => 'House Clean',
          'cost'=>'20$',
        ],
        ['addService' => 'Zoom Manage',
          'cost'=>'35$',
        ],
     ]);
    }
}
