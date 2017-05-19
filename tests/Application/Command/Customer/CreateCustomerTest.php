<?php

namespace Tests\Application\Command\Customer;

use Application\Command\Customer\CreateCustomerCommand;
use League\Tactician\Bundle\Middleware\InvalidCommandException;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CustomerCommandTest
 * @package Tests\Application\UseCase\Customer
 */
class CustomerCommandTest extends WebTestCase
{
    /** @var  CommandBus*/
    protected $commandbus;

    /**
     * setUp function
     */
    protected function setUp()
    {
        static::bootKernel([]);

        $this->commandbus = static::$kernel->getContainer()->get('tactician.commandbus');
    }

    public function testShouldCreatedUser()
    {
        $customer = $this->commandbus->handle(
            new CreateCustomerCommand(
                'test@test.com',
                'first',
                'last'
            )
        );

        $this->assertEquals($customer->email(), 'test@test.com');
    }

    public function testShouldThrowExceptionWhenCreatedUserWithInvalidCommand()
    {
        $this->expectException(InvalidCommandException::class);

        $this->expectExceptionMessageRegExp('~with 4 violation~');

        $this->commandbus->handle(
            new CreateCustomerCommand(
                'invalid',
                '',
                null
            )
        );
    }
}
