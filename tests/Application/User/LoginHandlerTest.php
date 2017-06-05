<?php

namespace Tests\Application\Command\Customer;

use Application\User\LoginCommand;
use Domain\User\Exception\UserInvalidPasswordException;
use Domain\User\Exception\UserNotFoundException;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class LoginHandlerTest
 * @package Tests\Application\Command\Customer
 */
class LoginHandlerTest extends WebTestCase
{
    /** @var  CommandBus */
    protected $commandbus;

    /**
     * setUp function
     */
    protected function setUp()
    {
        static::bootKernel([]);

        $this->commandbus = static::$kernel->getContainer()->get('tactician.commandbus');
    }

    public function testShouldDoLogin()
    {
        $logged = $this->commandbus->handle(
            new LoginCommand(
                'test@test.com',
                '123456'
            )
        );

        $this->assertTrue($logged);
    }


    public function testShouldReturnThatUserNotFound()
    {
        $this->expectException(UserNotFoundException::class);

        $logged = $this->commandbus->handle(
            new LoginCommand(
                'not_found@test.com',
                '123456'
            )
        );

        $this->assertTrue($logged);
    }

    public function testShouldReturnThatPasswordNotValid()
    {
        $this->expectException(UserInvalidPasswordException::class);

        $logged = $this->commandbus->handle(
            new LoginCommand(
                'test@test.com',
                '111111'
            )
        );

        $this->assertTrue($logged);
    }

}
