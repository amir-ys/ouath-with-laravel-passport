<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory()->state([
//             'email' => 'amir.you74@gmail.com' ,
//             'password' => bcrypt(123456)
//         ])->create();

        \App\Models\User::factory()->state([
            'email' => 'user@gmail.com' ,
            'password' => bcrypt(123456)
        ])->create();

        \App\Models\Customer::factory()->state([
            'email' => 'customer@gmail.com' ,
            'password' => bcrypt(123456)
        ])->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
