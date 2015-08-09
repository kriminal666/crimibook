<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 9/08/15
 * Time: 9:12
 */

namespace Crimibook\Presenters;


use Caffeinated\Presenter\Presenter;

class StatusPresenter extends Presenter {


    /**
     * Time since published status
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }

}