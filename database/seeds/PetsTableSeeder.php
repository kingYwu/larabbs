<?php

use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetsTableSeeder extends Seeder
{
    public function run()
    {

        $pets=factory(Pet::class)
            ->times(2)
            ->make();
        Pet::insert($pets->toArray());
    }

}

