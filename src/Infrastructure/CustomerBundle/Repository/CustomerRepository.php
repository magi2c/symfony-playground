<?php

namespace Infrastructure\CustomerBundle\Repository;

use Domain\Customer\Model\Customer;
use Domain\Customer\Repository\CustomerRepositoryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class CustomerRepository
 * @package Infrastructure\CustomerBundle\Repository
 */
class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface
{
    /**
     * Find by email
     *
     * @param string $email
     * @return Customer|null
     */
    public function findOneByEmail(string $email)
    {
        $user = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.email = :identifier')
            ->setParameter('identifier', $email)
            ->getQuery()
            ->getOneOrNullResult();

        return $user;
    }

    /**
     * Get users in array by id
     *
     * @param array $ids
     * @return Customer[]|null
     */
    public function findByIds(array $ids)
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.id IN (:identifiers)')
            ->setParameter('identifiers', $ids)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * Get user by id
     *
     * Important clear cache on entity update
     * Use update method to prevent issues with cache
     *
     * @param $id
     * @return Customer|null
     */
    public function findOneById(int $id)
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.id = :identifier')
            ->setParameter('identifier', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * Persist and Flush
     * @param Customer $customer
     */
    public function store(Customer $customer)
    {
        $this->_em->persist($customer);
        $this->_em->flush($customer);
    }
}
