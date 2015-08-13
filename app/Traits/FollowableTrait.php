<?php namespace Crimibook\Traits;

use Crimibook\User;

/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 13/08/15
 * Time: 19:47
 */
trait FollowableTrait
{

    /**
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {

        $idsWhoOtherUserFollows = $otherUser->follows()->lists('followed_id')->all();

        return in_array($this->id, $idsWhoOtherUserFollows);


    }


    /**
     * This can follow to many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function follows()
    {
        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')
            ->withTimestamps();
    }


    /**
     * List of this user followers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {

        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')
            ->withTimestamps();

    }


}