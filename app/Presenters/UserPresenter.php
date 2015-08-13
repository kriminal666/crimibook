<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 8/08/15
 * Time: 18:06
 */

namespace Crimibook\Presenters;


use Caffeinated\Presenter\Presenter;

class UserPresenter extends Presenter
{


    /**
     * Gravatar link
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {

        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s=$size";

    }

    /**
     * Counts user followers
     *
     * @return string
     */
    public function followersCount()
    {

        $count = $this->entity->followers()->count();

        $plural = str_plural('Follower', $count);

        return "{$count} {$plural}";

    }

    /**
     * Counts user statuses
     *
     * @return string
     */
    public function statusesCount()
    {

        $count = $this->entity->statuses()->count();

        $plural = str_plural('Status', $count);

        return "{$count} {$plural}";

    }

}