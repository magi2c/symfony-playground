<?php

namespace Infrastructure\UserBundle\Repository;

use Domain\User\Exception\UserNotFoundException;
use Domain\User\Model\User;
use Domain\User\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $db = ['test@test.com' => '123456'];

    public function findOneByEmail($email): User
    {
        if (!array_key_exists($email, $this->db)) {

            throw new UserNotFoundException();
        }

        return new User($email);
    }

}
