<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GamesPolicy
{
    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Game $game
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function update(User $user, Game $game)
    {
        return $user->hasRole('admin') || $user->id === $game->user_id;
    }

    public function delete(User $user, Game $game)
    {
        return $user->hasRole('admin') || $user->id === $game->user_id;
    }
}
