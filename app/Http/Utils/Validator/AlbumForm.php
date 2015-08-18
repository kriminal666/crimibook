<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 18/08/15
 * Time: 19:41
 */

namespace Crimibook\Http\Utils\Validator;


class AlbumForm extends FormValidator{

    /**
     * Album form validation rules
     * @var array
     */
    protected $rules =[

        'name' => 'required',
        'description' => 'required'
    ];

}