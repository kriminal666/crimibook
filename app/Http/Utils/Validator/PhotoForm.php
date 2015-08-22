<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 22/08/15
 * Time: 9:09
 */

namespace Crimibook\Http\Utils\Validator;


class PhotoForm extends FormValidator{

    /**
     * Photo form validation rules
     *
     * @var array
     */
    protected $rules = [

        'photo' => 'required | mimes:jpg,jpeg,png,bmp'
    ];

}