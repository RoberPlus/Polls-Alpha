<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Rober',
                'email' => 'correo@correo.com',
                'password' => bcrypt('12345678'),
                'coop_id' => 1,
                'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'role' => 'admin',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Rober2',
                'email' => 'correo2@correo.com',
                'password' => bcrypt('12345678'),
                'coop_id' => 1,
                'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'role' => 'veedor',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        User::insert($users);
    }
}
