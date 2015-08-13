<?php
/**
 * Created by PhpStorm.
 * User: criminal
 * Date: 6/08/15
 * Time: 20:14
 */

namespace Crimibook\Http\Utils\Validator;


use Exception;
use Illuminate\Support\MessageBag;

class FormValidationException extends Exception
{

    /**
     * @var MessageBag
     */
    protected $errors;


    /**
     * @param string $message
     * @param MessageBag $errors
     */
    function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    /**
     * Get form validation errors
     *
     * @return MessageBag
     */
    public function getErrors()
    {
        return $this->errors;
    }

}