<?php

namespace Domain\User\Model;


/**
 * Class User
 * @package Domain\User\Model
 */
class User
{
    /**
     * @var string
     */
    private $email;

    /**
     * User constructor.
     * @param string $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }


    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
}
