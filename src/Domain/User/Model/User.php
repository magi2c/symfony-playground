<?php

namespace Domain\User\Model;

use Domain\User\ValueObject\EncodedPasswordInterface;

/**
 * Class User
 * @package Domain\User\Model
 */
class User
{
    /** @var string */
    private $email;

    /** @var */
    private $password;

    /**
     * User constructor.
     * @param string $email
     * @param EncodedPasswordInterface $encodedPassword
     */
    public function __construct(string $email, EncodedPasswordInterface $encodedPassword)
    {
        $this->email = $email;
        $this->password = (string) $encodedPassword;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function password(): string
    {
        return $this->password;
    }

}
