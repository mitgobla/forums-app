<?php

namespace Database\Seeders;

use App\Models\ProfilePicture;
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

        ProfilePicture::factory()->count(50)->create();
    }
}
