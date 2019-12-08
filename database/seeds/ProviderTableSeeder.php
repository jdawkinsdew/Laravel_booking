<?php

use Illuminate\Database\Seeder;
use App\Model\Provider;
class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Provider::insert([
         ['name' => 'John Christon',
         'email' => 'john@gamil.com',
         'phone'=>'156-6654-4333',
        ],
        ['name' => 'Hashen Brain',
         'email' => 'hashen@gmail.com',
         'phone'=>'156-3654-4333',
        ],
        ['name' => 'Billing William',
         'email' => 'billing@gamil.com',
         'phone'=>'156-6564-4333',
        ],
        ['name' => 'Hous Morinas',
         'email' => 'house@hotmail.com',
         'phone'=>'156-1632-4333',
        ],
        ]);
    }
}
