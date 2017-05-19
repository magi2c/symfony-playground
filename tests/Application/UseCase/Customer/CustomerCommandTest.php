<?php

namespace Tests\Application\UseCase\Customer;

use Application\UseCase\Customer\CustomerCommand;
use Application\UseCase\Customer\Request\CreateCustomerRequest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CustomerCommandTest
 * @package Tests\Application\UseCase\Customer
 */
class CustomerCommandTest extends WebTestCase
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
    /**
     * @group unit
     */
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
}
