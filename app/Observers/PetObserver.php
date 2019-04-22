<?php

namespace App\Observers;

use App\Models\Pet;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class PetObserver
{
    public function creating(Pet $pet)
    {
        //
    }

    public function updating(Pet $pet)
    {
        //
    }
}