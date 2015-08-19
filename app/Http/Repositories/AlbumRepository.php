<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 18/08/15
 * Time: 20:34
 */

namespace Crimibook\Http\Repositories;


use Crimibook\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AlbumRepository
{


    /**
     * Base directory for albums
     *
     * @var
     */
    protected $albumBaseDir;

    /**
     *Constructor
     */
    function __construct()
    {
        $this->albumBaseDir = 'images/' . Auth::user()->name . '/albums/';
    }



    /**
     * Get feed for user
     *
     * @param User $user
     * @return mixed
     */
    public function getAlbumsForUser(User $user)
    {
        $userIds = $user->albums()->lists('user_id')->all();

        $userIds[] = $user->id;

        return Album::with('comments')->whereIn('user_id', $userIds)->latest()->get();

    }



    /**
     * Save the new album
     *
     * @param $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAlbum($input)
    {

        $album = Album::fromForm($input);

        if (!$this->createDirectory($album->name)) {
            return null;
        }

        $album->save();

        return $album;

    }


    /**
     * Create de new album directory
     *
     * @param $name
     * @return bool
     */
    public function createDirectory($name)
    {
        $path = $this->albumBaseDir . $name;

        if (!File::exists($path)) {
            if (!File::makeDirectory($path, 0775, true)) {

                return false;
            }
        } else {

            return false;
        }
        return true;

    }
}