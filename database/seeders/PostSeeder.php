<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'titulo' => 'Exploitando una vulnerabilidad XSS en sitios web',
                'descripcion' => 'Hoy exploramos cómo los ataques de Cross-Site Scripting pueden comprometer la seguridad de una web y cómo mitigar este riesgo.',
                'imagen' => 'https://picsum.photos/seed/xss/800/400',
                'user_id' => 1, // Ajusta según tus usuarios en la BD
            ],
            [
                'titulo' => 'Cómo romper un hash MD5 en segundos',
                'descripcion' => '¿Sabías que los hashes MD5 ya no son seguros? Probamos técnicas de cracking con diccionarios y ataques de fuerza bruta.',
                'imagen' => 'https://picsum.photos/seed/md5/800/400',
                'user_id' => 2,
            ],
            [
                'titulo' => 'Pentesting: Escaneo de redes con Nmap',
                'descripcion' => 'Descubre cómo usar Nmap para identificar servicios expuestos en una red y evaluar posibles vulnerabilidades.',
                'imagen' => 'https://picsum.photos/seed/nmap/800/400',
                'user_id' => 3,
            ],
            [
                'titulo' => 'Creando una botnet con Python',
                'descripcion' => 'En este post analizamos cómo funcionan las botnets y las medidas de protección contra estos ataques.',
                'imagen' => 'https://picsum.photos/seed/botnet/800/400',
                'user_id' => 4,
            ],
            [
                'titulo' => 'Cifrando archivos con AES-256',
                'descripcion' => 'Explicamos cómo cifrar y descifrar archivos con el estándar AES-256 en Python para proteger datos sensibles.',
                'imagen' => 'https://picsum.photos/seed/aes/800/400',
                'user_id' => 5,
            ],
        ];

        DB::table('posts')->insert($posts);
    }
}
