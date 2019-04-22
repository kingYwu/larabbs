<?php

use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetsTableSeeder extends Seeder
{
    public function run()
    {
        $pets = factory(Pet::class)->times(50)->make()->each(function ($pet, $index) {
            if ($index == 0) {
                // $pet->field = 'value';
            }
        });

        Pet::insert($pets->toArray());
    }

}

