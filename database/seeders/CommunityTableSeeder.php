<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\User;
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

        // randomly attach users to communities
        Community::each(function ($community) {
            // random amount of users to attach
            $randomAmount = rand(1, 10);
            // get all users
            $users = User::all();
            // get random users
            $randomUsers = $users->random($randomAmount);
            // attach users to community if not already attached
            $randomUsers->each(function ($user) use ($community) {
                if (!$community->users->contains($user->id)) {
                    $community->users()->attach($user->id);
                }
            });
        });

    }
}
