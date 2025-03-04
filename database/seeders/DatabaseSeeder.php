<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Follower;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Post::factory(10)->create();
        Comentario::factory(10)->create();
        Like::factory(10)->create();
        Follower::factory(10)->create();
    }
}
