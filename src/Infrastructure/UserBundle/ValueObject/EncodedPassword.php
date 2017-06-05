<?php

namespace Infrastructure\UserBundle\ValueObject;

use Domain\User\Exception\InvalidPasswordException;
use Domain\User\ValueObject\EncodedPasswordInterface;
use Infrastructure\UserBundle\Encoder\PasswordEncoder;


class EncodedPassword implements EncodedPasswordInterface
{
    /**
     * @var string
     */
    private $password;

    /**
     * EncodedPassword constructor.
     *
     * @param string $plainPassword
     * @throws InvalidPasswordException
     */
    public function __construct(string $plainPassword)
    {
        $this->validate($plainPassword);

        $this->setPassword($plainPassword);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->password;
    }

    /**
     * @param string|null $plainPassword
     * @throws InvalidPasswordException
     */
    private function validate(string $plainPassword)
    {
        if (6 > strlen($plainPassword)) {
            throw new InvalidPasswordException();
        }
    }

    /**
     * @param string $plainPassword
     */
    private function setPassword(string $plainPassword)
    {
        $encoder = new PasswordEncoder();

        $this->password = $encoder->encodePassword($plainPassword, null);
    }
}
