<?php

namespace Domain\Customer\Repository;

use Domain\Customer\Model\Customer;

/**
 * Interface CustomerRepositoryInterface
 * @package Domain\Customer\Repository
 */
interface CustomerRepositoryInterface
{
    /**
     * Find by email
     *
     * Important clear cache on entity update
     * Use update method to prevent issues with cache
     *
     * @param string $username
     * @return Customer|null
     */
    public function findOneByEmail(string $username);

    /**
     * Get users in array by id
     *
     * Important clear cache on entity update
     * Use update method to prevent issues with cache
     *
     * @param array $ids
     * @return Customer[]|null
     */
    public function findByIds(array $ids);

    /**
     * Get user by id
     *
     * Important clear cache on entity update
     * Use update method to prevent issues with cache
     *
     * @param $id
     * @return Customer|null
     */
    public function findOneById(int $id);

    /**
     * Persist and Flush
     * @param Customer $customer
     */
    public function store(Customer $customer);
}
