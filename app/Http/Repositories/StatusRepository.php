<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 12/08/15
 * Time: 22:06
 */

namespace Crimibook\Http\Repositories;


use Crimibook\Models\Comment;
use Crimibook\Models\Status;
use Crimibook\User;

class StatusRepository
{


    /**
     * Get feed for user
     *
     * @param User $user
     * @return mixed
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->follows()->lists('followed_id')->all();

        $userIds[] = $user->id;

        return Status::with('comments')->whereIn('user_id', $userIds)->latest()->get();

    }


    /**
     * Leave new comment
     *
     * @param $input
     * @return static
     */
    public function leaveComment($input)
    {

        $comment = Comment::leave($input['body'], $input['status_id']);

        User::findOrFail($input['user_id'])->comments()->save($comment);

        return $comment;

    }


    /**
     * Delete comment
     *
     * @param $id
     */
    public function deleteComment($id)
    {

        Comment::findOrFail($id)->delete();

    }

}