<?php

namespace Tests\Application\UseCase\Customer;

use Application\UseCase\Customer\CustomerCommand;
use Application\UseCase\Customer\Request\CreateCustomerRequest;
use Tests\TestCase;

/**
 * Class CustomerCommandTest
 * @package Tests\Application\UseCase\Customer
 */
class CustomerCommandTest extends TestCase
{
    /** @var  CustomerCommand */
    protected $service;

    /**
     * setUp function
     */
    protected function setUp()
    {
        static::bootKernel([]);

        $this->service = static::$kernel->getContainer()->get('customer.use_case.customer');
    }

    public function testShouldCreatedUser()
    {
        $customer = $this->service->create(
            new CreateCustomerRequest(
                'test@test.com',
                'first',
                'last'
            )
        );

        $this->assertEquals($customer->email(), 'test@test.com');
    }

    public function testShouldThrowExceptionWhenCreatedUserWithInvalidCommand()
    {
        $this->markTestIncomplete('ToDo validate request');

        $this->expectException(InvalidCommandException::class);

        $this->expectExceptionMessageRegExp('~with 4 violation~');

        $this->service->handle(
            new CreateCustomerCommand(
                'invalid',
                '',
                null
            )
        );
    }
}
