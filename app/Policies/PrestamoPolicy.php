<?php

namespace App\Policies;

use App\Models\Prestamo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PrestamoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Prestamo $prestamo): Response
    {
        return $user->id === $prestamo->user_id || $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return Auth::check()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Prestamo $prestamo): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Prestamo $prestamo): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Prestamo $prestamo): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Prestamo $prestamo): Response
    {
        return $user->isAdmin()
            ? Response::allow()
            : Response::denyAsNotFound();
    }
}
