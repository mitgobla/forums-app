<?php

namespace Database\Seeders;

use App\Models\Animal;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal = new Animal;
        $animal->name = 'Dog';
        $animal->weight = 351.6;
        $animal->date_of_birth = '2010-01-01 00:00:00';
        $animal->save();

        Animal::factory()->count(50)->create();
    }
}
