<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comentarios = [
            '¡Excelente post! Me gustaría ver más sobre este tema.',
            'Muy interesante, ¿qué herramientas recomiendas para esto?',
            '¿Es legal hacer esto? 😅',
            'He probado este método y funciona perfectamente.',
            'Creo que hay una vulnerabilidad similar en algunos CMS.',
            'Buen artículo, pero siempre hay que tener cuidado con la ética en la ciberseguridad.',
            '¡Genial! Voy a probarlo en un entorno controlado.',
            '¿Cómo podríamos prevenir este tipo de ataques en aplicaciones web?',
            'Esto me recordó a un exploit que usé en un CTF.',
            'Impresionante, pero ¿qué opinas de la seguridad en sistemas IoT?',
        ];

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'user_id' => rand(1, 5), // Asignar usuarios aleatorios
                'post_id' => rand(1, 5), // Asignar posts aleatorios
                'comentario' => $comentarios[array_rand($comentarios)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('comentarios')->insert($data);
    }
}
