<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'John Doe';
        $user->email = 'john.doe@email.com';
        $user->password = 'password';
        $user->email_verified_at = now();
        $user->remember_token = Str::random(10);
        $user->save();

        User::factory()->count(50)->create();
    }
}
