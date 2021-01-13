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
                'title' => 'Duis maximus pulvinar egestas',
                'description' => 'Nam sollicitudin eros felis, et feugiat tortor consectetur eu. Duis suscipit lorem nibh, non imperdiet neque facilisis id. Morbi venenatis at felis ac pharetra. In nec eros lorem. Vivamus sed enim ac dui congue semper ac at velit. Proin id est nibh. Quisque cursus eleifend massa, in dapibus purus pulvinar nec. Sed blandit dui aliquet ex semper, sed eleifend lorem auctor. Sed consectetur tortor eget sem porta, a lobortis sem sollicitudin. Vivamus consectetur, felis ac hendrerit pretium, enim ipsum commodo est, et finibus magna nunc ut lacus. Cras eget maximus nibh.',
                'image' => 'https://picsum.photos/340/390',
                'coop_id' => 1,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sed consectetur tortor',
                'description' => 'Integer lacus odio, scelerisque nec dolor vitae, convallis accumsan libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse scelerisque iaculis varius. Vestibulum hendrerit massa nec leo condimentum elementum suscipit in odio. Duis tristique varius justo, sit amet tempus justo vestibulum nec. Pellentesque maximus auctor nunc at facilisis. Cras vitae efficitur enim, et consectetur nibh.',
                'image' => 'https://picsum.photos/340/390',
                'coop_id' => 1,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vestibulum hendrerit massa',
                'description' => 'Ut et vulputate justo. Aliquam vehicula vel nulla eget ullamcorper. Integer erat mauris, aliquam at neque id, rhoncus egestas odio. Phasellus id semper ex. Nullam ex quam, dictum ac aliquam eu, scelerisque sed ligula. Morbi ac augue eget ex tempor bibendum. Donec non neque vel metus iaculis lobortis non ac quam. Duis ipsum purus, euismod at urna et, efficitur auctor justo. Pellentesque sollicitudin vel ante in placerat. Pellentesque posuere auctor justo eget maximus.',
                'image' => 'https://picsum.photos/340/390',
                'coop_id' => 2,
                'status' => 'active',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Pellentesque sollicitudin vel ante',
                'description' => 'Vivamus vel laoreet dolor. In sagittis sapien posuere enim ultrices, sit amet pellentesque erat maximus. Quisque vel nulla ut est porta placerat in finibus enim. Quisque ultricies velit a mattis tristique. Aliquam erat volutpat. Aenean laoreet urna nec sem tincidunt pellentesque. Quisque odio est, efficitur ut orci non, tincidunt pharetra risus.',
                'image' => 'https://picsum.photos/340/390',
                'coop_id' => 1,
                'status' => 'disable',
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Nullam faucibus luctus urna',
                'description' => 'Cras mollis, nisi ac accumsan lacinia, mauris tortor dapibus nulla, et posuere neque neque vel elit. Nullam faucibus luctus urna sed gravida. Nullam iaculis pellentesque fringilla. Sed nec dignissim ligula. Fusce egestas, velit sed facilisis eleifend, arcu nulla suscipit tortor, nec iaculis arcu neque quis lorem. Integer efficitur enim porttitor nisi ornare, ut congue magna accumsan. Maecenas varius vehicula pharetra. Sed nec consequat ante.',
                'image' => 'https://picsum.photos/340/390',
                'status' => 'active',
                'coop_id' => 2,
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        Poll::insert($polls);
    }
}
