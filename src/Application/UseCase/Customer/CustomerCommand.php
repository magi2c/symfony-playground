<?php

namespace Application\UseCase\Customer;

use Domain\Customer\Model\Customer;
use Application\UseCase\Customer\Request\CreateCustomerRequest;
use Domain\Customer\Repository\CustomerRepositoryInterface;

/**
 * Class CustomerCommand
 * @package Application\UseCase\Customer
 */
class CustomerCommand
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
     * @param CreateCustomerRequest $request
     * @return Customer
     */
    public function create(CreateCustomerRequest $request): Customer
    {
        $customer = $request->toModel();

        //ToDo could not find driver
        //$this->repository->store($customer);

        return $customer;
    }
}
