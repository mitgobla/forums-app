<?php

namespace Database\Seeders;

use App\Models\Community;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $community = new Community();
        $community->name = 'My first community';
        $community->slug = 'my-first-community';
        $community->description = 'This is my first community';
        $community->image = 'https://via.placeholder.com/150';

        $community->save();

        $community->users()->attach(1);

        Community::factory()->count(10)->create();

    }
}
