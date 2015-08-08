<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 8/08/15
 * Time: 18:06
 */

namespace Crimibook\Presenters;



use Caffeinated\Presenter\Presenter;

class UserPresenter extends Presenter {


    public function gravatar(){

        $email = md5($this->email);
        return "//www.gravatar.com/avatar/{$email}?s=30";

    }

}