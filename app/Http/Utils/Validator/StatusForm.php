<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 6/08/15
 * Time: 20:19
 */

namespace Crimibook\Http\Utils\Validator;


class StatusForm extends FormValidator {

    /**
     * Validation rules for User form
     *
     * @var array
     */
    protected $rules = [
        'body' => 'required',
        'image_path' => 'mimes:jpg,jpeg,png,bmp'
    ];

}