<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 15/08/15
 * Time: 12:21
 */

namespace Crimibook\Presenters;


use Caffeinated\Presenter\Presenter;

class CommentPresenter extends Presenter {

    /**
     * Time since published comment
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }

}