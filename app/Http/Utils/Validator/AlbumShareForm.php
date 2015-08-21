<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 21/08/15
 * Time: 20:02
 */

namespace Crimibook\Http\Utils\Validator;


class AlbumShareForm extends FormValidator{

    /**
     * Album share form rules
     *
     * @var array
     */
    protected $rules = [
        'shareWith' => 'required'
    ];

}