<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $user_id = rand(1, 5);
            $follower_id = rand(1, 5);

            // Evitar que un usuario se siga a sí mismo
            while ($user_id === $follower_id) {
                $follower_id = rand(1, 5);
            }

            $data[] = [
                'user_id' => $user_id, // Usuario que es seguido
                'follower_id' => $follower_id, // Usuario que sigue
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('followers')->insert($data);
    }
}
