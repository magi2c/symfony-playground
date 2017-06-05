<?php

namespace Infrastructure\UserBundle\Repository;

use Domain\User\Exception\UserNotFoundException;
use Domain\User\Model\User;
use Domain\User\Repository\UserRepositoryInterface;
use Infrastructure\UserBundle\ValueObject\EncodedPassword;

class UserRepository implements UserRepositoryInterface
{
    private $db = [];

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->db['test@test.com'] = new User('test@test.com', new EncodedPassword('123456'));
    }

    public function findOneByEmail($email): User
    {
        if (!array_key_exists($email, $this->db)) {

            throw new UserNotFoundException();
        }

        return $this->db[$email];
    }

}
