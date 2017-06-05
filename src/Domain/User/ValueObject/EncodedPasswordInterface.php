<?php

namespace Domain\User\ValueObject;

interface EncodedPasswordInterface
{
    /**
     * EncodedPasswordInterface constructor.
     * @param string $plainPassword
     */
    public function __construct(string $plainPassword);

    /**
     * @return string
     */
    public function __toString(): string;
}