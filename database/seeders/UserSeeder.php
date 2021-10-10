<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Admin::firstOrCreate(
            ['email' => 'admin@email.com'],
            [   'name' => 'Superadmin', 
                'password' => Hash::make('admin@email.com'),
                'image_url' => '',
            ]
        );

        $user = \App\Models\User::firstOrCreate(
            ['email' => 'user@email.com'],
            [   'name' => 'User', 
                'password' => Hash::make('user@email.com'),
                'image_url' => '',
            ]
        );

        $agent = \App\Models\Agent::firstOrCreate(
            ['email' => 'agent@email.com'],
            [   'name' => 'Agent', 
                'password' => Hash::make('agent@email.com'),
                'image_url' => '',
            ]
        );

        $customer = \App\Models\Customer::firstOrCreate(
            ['email' => 'customer@email.com'],
            [   'name' => 'Customer', 
                'password' => Hash::make('customer@email.com'),
                'image_url' => '',
            ]
        );
    }
}
