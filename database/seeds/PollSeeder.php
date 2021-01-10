<?php

use App\Poll;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polls = [
            [
                'title' => 'Titulo prueba 1',
                'description' => 'Esto es una pequena descripcion de prueba',
                'image' => 'image.jpg',
                'coop_id' => 2,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Titulo prueba 2',
                'description' => 'Esto es una pequena descripcion de prueba',
                'image' => 'image.jpg',
                'coop_id' => 1,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Titulo prueba 3',
                'description' => 'Esto es una pequena descripcion de prueba',
                'image' => 'image.jpg',
                'coop_id' => 2,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Titulo prueba 4',
                'description' => 'Esto es una pequena descripcion de prueba',
                'image' => 'image.jpg',
                'coop_id' => 1,
                'status' => 'disable',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Titulo prueba 5',
                'description' => 'Esto es una pequena descripcion de prueba',
                'image' => 'image.jpg',
                'status' => 'active',
                'coop_id' => 2,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        Poll::insert($polls);
    }
}
