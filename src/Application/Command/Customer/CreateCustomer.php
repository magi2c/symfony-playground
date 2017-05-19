<?php

namespace Application\Command\Customer;

use Domain\Customer\Model\Customer;
use Domain\Customer\Repository\CustomerRepositoryInterface;

/**
 * Class CreateCustomer
 * @package Application\Command\Customer
 */
class CreateCustomer
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;

    /**
     * CustomerCommand constructor.
     * @param CustomerRepositoryInterface $repository
     */
    public function __construct(
        CustomerRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param CreateCustomerCommand $command
     * @return Customer
     */
    public function handle(CreateCustomerCommand $command): Customer
    {
        $customer = $command->toModel();

        //ToDo could not find driver
        //$this->repository->store($customer);

        return $customer;
    }
}
