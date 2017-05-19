<?php

namespace Tests\Application\Command\Customer;

use Application\Command\Customer\CreateCustomerCommand;
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
    /**
     * @group unit
     */
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
}
