<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
         'role_id' => 1,
         'active' => 1,
         'name'=>'sethsaren',
         'username'=>'sethsaren',
         'email' => 'setharen@gmail.com',
         'phone' => '154-343-2343',
         'password' => bcrypt('123'),
        'remember_token' => str_random(10)
     ]);
     
        //
    }
}
