<?php

namespace Database\Seeders;

use App\Models\ProfilePicture;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profilePicture = new ProfilePicture;
        $profilePicture->path = 'https://via.placeholder.com/150';
        $profilePicture->user_id = 1;
        $profilePicture->save();

        $faker = \Faker\Factory::create();
        User::each(function ($user) use ($faker) {
            $profilePicture = new ProfilePicture;
            $profilePicture->path = $faker->imageUrl(480, 480, 'animals', true);
            $profilePicture->user_id = $user->id;
            $profilePicture->save();
        }
        );
    }
}
