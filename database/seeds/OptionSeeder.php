<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'option' => 'Option One',
                'poll_id' => '1',
            ],
            [
                'option' => 'Option Two',
                'poll_id' => '1',
            ],
            [
                'option' => 'Option Three',
                'poll_id' => '1',
            ],
            [
                'option' => 'Option One',
                'poll_id' => '2',
            ],
            [
                'option' => 'Option Two',
                'poll_id' => '2',
            ],
            [
                'option' => 'Option Three',
                'poll_id' => '2',
            ],
            [
                'option' => 'Option One',
                'poll_id' => '3',
            ],
            [
                'option' => 'Option Two',
                'poll_id' => '3',
            ],
            [
                'option' => 'Option Three',
                'poll_id' => '3',
            ],
            [
                'option' => 'Option One',
                'poll_id' => '4',
            ],
            [
                'option' => 'Option Two',
                'poll_id' => '4',
            ],
            [
                'option' => 'Option Three',
                'poll_id' => '4',
            ],
            [
                'option' => 'Option One',
                'poll_id' => '5',
            ],
            [
                'option' => 'Option Two',
                'poll_id' => '5',
            ],
            [
                'option' => 'Option Three',
                'poll_id' => '5',
            ],
        ];

        Option::insert($options);
    }
}
