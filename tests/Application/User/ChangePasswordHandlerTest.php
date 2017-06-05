<?php

namespace Tests\Application\Command\Customer;

use Application\User\ChangePasswordCommand;
use Domain\User\Exception\InvalidPasswordException;
use Domain\User\Exception\UserInvalidPasswordEqualException;
use Domain\User\Exception\UserInvalidPasswordException;
use Domain\User\Exception\UserNotFoundException;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ChangePasswordHandlerTest
 * @package Tests\Application\Command\Customer
 */
class ChangePasswordHandlerTest extends WebTestCase
{
    public function testShouldChangePasswordAndEventEmitted()
    {
        $this->markTestIncomplete('Pending implementation');

        $command = new ChangePasswordCommand(
            'test@test.com',
            '123456',
            '654321'
        );
    }


    public function testShouldReturnThatUserNotFound()
    {
        $this->markTestIncomplete('Pending implementation');

        $this->expectException(UserNotFoundException::class);

        $command = new ChangePasswordCommand(
            'not_found@test.com',
            '123456',
            '654321'
        );
    }

    public function testShouldReturnThatUserPasswordNotValid()
    {
        $this->markTestIncomplete('Pending implementation');

        $this->expectException(UserInvalidPasswordException::class);

        $command = new ChangePasswordCommand(
            'test@test.com',
            '111111',
            '654321'
        );
    }

    public function testShouldReturnThatNewPasswordNotValid()
    {
        $this->markTestIncomplete('Pending implementation');

        $this->expectException(InvalidPasswordException::class);

        $command = new ChangePasswordCommand(
            'not_found@test.com',
            '123456',
            '123'
        );
    }

    public function testShouldReturnThatNewPasswordEqual()
    {
        $this->markTestIncomplete('Pending implementation');

        $this->expectException(UserInvalidPasswordEqualException::class);

        $command = new ChangePasswordCommand(
            'not_found@test.com',
            '123456',
            '123456'
        );
    }

}
