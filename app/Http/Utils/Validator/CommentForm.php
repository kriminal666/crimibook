<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 15/08/15
 * Time: 10:56
 */

namespace Crimibook\Http\Utils\Validator;


class CommentForm extends FormValidator {

    /**
     * Validation rules for comment form
     *
     * @var array
     */
    protected $rules = [

        'body' => 'required'
    ];
}