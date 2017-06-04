<?php

namespace Domain\User\Repository;

use Domain\User\Exception\UserNotFoundException;
use Domain\User\Model\User;

/**
 * Interface UserRepositoryInterface
 * @package Domain\User\Repository
 */
interface UserRepositoryInterface
{
    /**
     * @param $email
     * @return User
     * @throws UserNotFoundException
     */
    public function findOneByEmail($email) : User;
}
