<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alice Johnson',
                'email' => 'ale@example.com',
                'username' => 'alicej',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'imagen' => '04e3b3f8-55ae-4364-9389-891b043bba11.jpg',
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'username' => 'bobsmith',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'imagen' => 'https://picsum.photos/seed/bob/200/200'
            ],
            [
                'name' => 'Charlie Brown',
                'email' => 'charlie@example.com',
                'username' => 'charlieb',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'imagen' => 'https://picsum.photos/seed/charlie/200/200',
            ],
            [
                'name' => 'Diana Prince',
                'email' => 'diana@example.com',
                'username' => 'dianap',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'imagen' => 'https://picsum.photos/seed/diana/200/200',
            ],
            [
                'name' => 'Ethan Hunt',
                'email' => 'ethan@example.com',
                'username' => 'ethanh',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'imagen' => 'https://picsum.photos/seed/ethan/200/200',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
