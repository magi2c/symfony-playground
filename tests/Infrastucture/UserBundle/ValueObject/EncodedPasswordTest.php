<?php

namespace Tests\Infrastructure\UserBundle\ValueObject;

use Domain\User\Exception\InvalidPasswordException;
use Infrastructure\UserBundle\ValueObject\EncodedPassword;
use PHPUnit\Framework\TestCase;

/**
 * Class EncodedPasswordTest
 * @package Tests\Infrastructure\UserBundle\ValueObject
 */
class EncodedPasswordTest extends TestCase
{
    public function testShouldEncodedPassword()
    {
        $valueObject = new EncodedPassword('123456');

        $this->assertStringStartsWith(
            '$2y$12$',
            (string) $valueObject
        );
    }

    public function testShouldReturnThatPasswordNotValid()
    {
        $this->expectException(InvalidPasswordException::class);

        new EncodedPassword('123');
    }

    public function testShouldReturnThatTypeError()
    {
        $this->expectException(\TypeError::class);

        new EncodedPassword(null);
    }

}
