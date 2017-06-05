<?php

namespace Application\User;

class ChangePasswordCommand
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $newPassword;

    /**
     * ChangePasswordCommand constructor.
     * @param string $email
     * @param string $password
     * @param string $newPassword
     */
    public function __construct($email, $password, $newPassword)
    {
        $this->email = $email;
        $this->password = $password;
        $this->newPassword = $newPassword;
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

    /**
     * @return string
     */
    public function newPassword(): string
    {
        return $this->newPassword;
    }
}
