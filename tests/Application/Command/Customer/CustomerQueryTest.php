<?php

namespace Tests\Application\Command\Customer;

use Application\Command\Customer\CreateCustomerCommand;
use Application\Command\Customer\CustomerQuery;
use Domain\Customer\Exception\CustomerNotFoundException;
use Tests\TestCase;

/**
 * Class CustomerCommandTest
 * @package Tests\Application\UseCase\Customer
 */
class CustomerQueryTest extends TestCase
{
    /** @var  CustomerQuery*/
    protected $query;

    /**
     * setUp function
     */
    protected function setUp()
    {
        static::bootKernel([]);

        $this->query = static::$kernel->getContainer()->get('customer.query.create_customer');
    }

    public function testShouldReturnCustomer()
    {
        $email = 'test@test.com';

        $this->createCustomer($email);

        $customer = $this->query->findByUsername($email);

        $this->assertEquals($customer->email(), $email);
    }

    public function testShouldReturnExceptionCustomerNotFound()
    {
        $this->expectException(CustomerNotFoundException::class);

        $this->expectExceptionMessageRegExp('~account.customer.exception.customer_not_found~');

        $this->query->findByUsername('customer_not_found@test.com');
    }

    private function createCustomer(string $email)
    {
        $commandbus= static::$kernel->getContainer()->get('tactician.commandbus');
        $commandbus->handle(
            new CreateCustomerCommand(
                $email,
                'first',
                'last'
            )
        );
    }
}
