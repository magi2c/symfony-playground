<?php

namespace Infrastructure\UserBundle\Encoder;

use Domain\User\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class PasswordEncoder implements PasswordEncoderInterface
{
    private $encoder;

    /**
     * PasswordEncoder constructor.
     */
    public function __construct()
    {
        $this->encoder = new BCryptPasswordEncoder(12);
    }

    public static function encoder()
    {
        return new self();
    }

    /**
     * @param string $raw
     * @param string $salt
     * @return string
     */
    public function encodePassword($raw, $salt)
    {
        return $this->encoder->encodePassword($raw, $salt);
    }

    /**
     * @param string $encoded
     * @param string $raw
     * @param string $salt
     * @return bool
     */
    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $this->encoder->isPasswordValid($encoded, $raw, $salt);
    }

}