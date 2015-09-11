<?php

namespace Crimibook\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Follow
 * Used only on sleeping Owl
 *
 * @package Crimibook\Models
 */
class Follow extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'follows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['follower_id', 'followed_id'];

    //Relations

    /**
     * This belongs to one user(follower)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Crimibook\User', 'follower_id');
    }

    /**
     * This follows to many other users
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userFollowsTo()
    {
        return $this->hasMany('Crimibook\User', 'id', 'followed_id', 'follows');
    }

}
