<?php

namespace Crimibook;


use Caffeinated\Presenter\Traits\PresentableTrait;
use Crimibook\Models\Status;
use Crimibook\Traits\FollowableTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package Crimibook
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, PresentableTrait, FollowableTrait;

    protected $presenter = 'Crimibook\Presenters\UserPresenter';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Search the user with id
     *
     * @param $id
     * @return mixed
     */
    public static function whoHas($id)
    {

        return static::where(compact('id'))->first();

    }

    /**
     * Add user status
     *
     * @param Status $status
     * @return Model
     */
    public function publishStatus(Status $status)
    {
        return $this->statuses()->save($status);
    }


    /**
     * Determine if User is auth user
     *
     * @param $user
     * @return bool
     */
    public function is($user)
    {
        return $this->id == $user->id;
    }


    /**
     * This has many Status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('Crimibook\Models\Status', 'user_id');
    }


}
