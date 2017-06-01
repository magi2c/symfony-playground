<?php

namespace Application\Command\Customer;

use Domain\Customer\Exception\CustomerNotFoundException;
use Domain\Customer\Repository\CustomerRepositoryInterface;

/**
 * Class CustomerQuery
 * @package Application\Command\Customer
 */
class CustomerQuery
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

    public function findByUsername(string $username)
    {
        $customer = $this->repository->findOneByEmail($username);

        if (!$customer) {
            throw new CustomerNotFoundException();
        }

        return $customer;
    }
}
