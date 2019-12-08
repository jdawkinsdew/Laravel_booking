<?php

use Illuminate\Database\Seeder;
use App\Model\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Role::insert([
            ['name'=>'Admin'],
            ['name'=>'Receiption'],
            ['name'=>'Manager'],
            ['name'=>'CEO']
               ]);
           //
    }
}
