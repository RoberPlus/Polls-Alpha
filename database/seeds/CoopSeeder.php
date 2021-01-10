<?php

use App\Coop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coops = [
            [
                'name' => 'DCOOP'

            ],
            [
                'name' => 'CEB'
            ],
            [
                'name' => 'COREN'
            ]
        ];
    
        Coop::insert($coops);
    }
}
