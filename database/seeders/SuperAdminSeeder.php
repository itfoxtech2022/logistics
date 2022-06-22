<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'sadmin', 'email' => 'super@admin.com', 'password' => '$2y$10$UZxmNzRVJWHjHjZZdY4FXeg1rV7Tb9FOcTyiYHVEdZjJ6bGjPQvEq', 'user_role' => 1, 'remember_token' => '',],
    
            ];
    
            foreach ($items as $item) {
                \App\Models\User::create($item);
            }
        }
    }
    