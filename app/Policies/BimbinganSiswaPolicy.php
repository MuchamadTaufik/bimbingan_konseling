<?php

namespace App\Policies;

use App\Models\BimbinganSiswa;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BimbinganSiswaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BimbinganSiswa $bimbinganSiswa): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BimbinganSiswa $bimbinganSiswa): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BimbinganSiswa $bimbinganSiswa): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BimbinganSiswa $bimbinganSiswa): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BimbinganSiswa $bimbinganSiswa): bool
    {
        //
    }
}
