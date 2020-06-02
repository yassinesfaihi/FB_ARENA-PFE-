<?php

use Illuminate\Database\Seeder;
use\App\Role;
use\App\User;
class UsersTableSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
       
        $admin=User::create([
            'name' => 'admin',
            'email' => 'admin@test.t',
            'password' =>Hash::make('adminadmin'),
            'phone' => '11111111',
            'adress' => 'tunis',
            'role' => 'admin'



    ]);
     $prop=User::create([
            'name' => 'prop',
            'email' => 'prop@test.t',
            'password' =>Hash::make('propprop'),
            'phone' => '22222222',
            'adress' => 'tunis',
            'role' => 'prop'




    ]);
    
    $gerant=User::create([
        'name' => 'gerant',
        'email' => 'gerant@test.t',
        'password' =>Hash::make('gerantgerant'),
        'phone' => '33333333',
        'adress' => 'tunis',
        'role' => 'gerant'


]);
 

    }
}
