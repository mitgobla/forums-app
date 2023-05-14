<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

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
        $user->assignRole('admin');
        $user->save();

        User::factory()->count(50)->hasAttached(Community::factory())->has(Post::factory()->count(3))->create();
    }
}
