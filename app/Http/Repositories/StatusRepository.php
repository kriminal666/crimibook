<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 12/08/15
 * Time: 22:06
 */

namespace Crimibook\Http\Repositories;


use Crimibook\Models\Status;
use Crimibook\User;

class StatusRepository {



    public function getFeedForUser(User $user)
    {
        $userIds =  $user->follows()->lists('followed_id')->all();

        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();

    }

}