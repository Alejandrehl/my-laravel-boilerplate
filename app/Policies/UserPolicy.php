<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability) {
        if ($user->isAdmin()) {
            return true;
        }
    }

    //El primer parametro siempre es el usuario autenticado.
    //El segundo parametro es el usuario que se pasa por controlador.
    //Se evalua si el id es el mismo.
    public function edit(User $authUser, User $user) {
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user) {
        return $authUser->id === $user->id;
    }
}
