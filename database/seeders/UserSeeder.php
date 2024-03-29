<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@test.com',
                'username' => 'admin',
                'role' => 'Admin',
                'password' => bcrypt('admin123'),
                'remember_token' => Str::random(10),

    
                  
            ]
        );


        
            
        
   
    }


   
}