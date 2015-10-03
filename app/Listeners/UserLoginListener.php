<?php

namespace Crimibook\Listeners;


use Crimibook\User;


class UserLoginListener
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param User $user
     * @internal param User $event
     */
    public function handle(User $user)
    {
        $user->inLine = true;
        $user->save();

    }
}
