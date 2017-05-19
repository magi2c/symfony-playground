<?php

namespace Application\UseCase\Customer;

use Domain\Customer\Exception\CustomerNotFoundException;
use Domain\Customer\Model\Customer;
use Domain\Customer\Repository\CustomerRepositoryInterface;

/**
 * Class CustomerQuery
 * @package Application\UseCase\Customer
 */
class CustomerQuery
{

    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;

    /**
     * CustomerQuery constructor.
     * @param CustomerRepositoryInterface $repository
     */
    public function __construct(
        CustomerRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * Find by id
     *
     * @param $id
     * @return Customer|null
     * @throws CustomerNotFoundException
     */
    public function findOneById(int $id)
    {
        $user = $this->repository->findOneById($id);

        if (!$user) {
            throw new CustomerNotFoundException();
        }

        return $user;
    }

    /**
     * @param array $customerIds
     * @return Customer[]
     */
    public function findByIds(array $customerIds)
    {
        $customersResult = $this->repository->findByIds($customerIds);
        $customers = [];

        foreach ($customersResult as $customer) {
            $customers[$customer->id()] = $customer;
        }

        return $customers;
    }

    /**
     * Find by email
     *
     * @param $email
     * @return Customer|null
     * @throws CustomerNotFoundException
     */
    public function findOneByEmail(string $email)
    {
        $user = $this->repository->findOneByEmail($email);

        if (!$user) {
            throw new CustomerNotFoundException();
        }

        return $user;
    }
}
