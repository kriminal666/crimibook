<?php

namespace Crimibook\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'albums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'user_id'];


    /**
     * Create new this from input
     *
     * @param $input
     * @return static
     */
    public static function fromForm($input)
    {
        $album = new static;

        $album->name = $input['name'];
        $album->description =  $input['description'];
        $album->user_id = $input['user_id'];

        return $album;
    }

    /**
     * Add photo to the album
     *
     * @param Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }



    //Relations

    /**
     * This belongs to one user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('Crimibook\User', 'user_id');
    }

    /**
     * This is shared with many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sharedWith()
    {
        return $this->belongsToMany('Crimibook\User');
    }

    /**
     * This has many photos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('Crimibook\Models\Photo', 'album_id');
    }
}
