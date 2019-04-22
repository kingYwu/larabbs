<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pet;

class PetPolicy extends Policy
{
    public function update(User $user, Pet $pet)
    {
        // return $pet->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Pet $pet)
    {
        return true;
    }
}
