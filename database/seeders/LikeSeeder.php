<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'user_id' => rand(1, 5), // Usuario aleatorio (ajustar según la cantidad de usuarios)
                'post_id' => rand(1, 5), // Post aleatorio (ajustar según la cantidad de posts)
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('likes')->insert($data);
    }
}
