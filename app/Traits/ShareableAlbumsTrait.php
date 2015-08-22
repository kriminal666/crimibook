<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 22/08/15
 * Time: 8:43
 */

namespace Crimibook\Traits;


use Crimibook\User;

trait ShareableAlbumsTrait {

    /**
     * This has many albums
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums()
    {
        return $this->hasMany('Crimibook\Models\Album', 'user_id');
    }

    /**
     * All albums of other users shared with me
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function albumsSharedWithMe()
    {
        return $this->belongsToMany('Crimibook\Models\Album');
    }

    /**
     * Shared albums by other specific user with me
     *
     * @param User $otherUser
     * @return mixed
     */
    public function sharedAlbumsWithMe(User $otherUser)
    {
        $OtherUserAlbums = $otherUser->albums()->get();
        $albumsSharedWithMe = $this->albumsSharedWithMe()->get();

        return $OtherUserAlbums->intersect($albumsSharedWithMe);
    }



}