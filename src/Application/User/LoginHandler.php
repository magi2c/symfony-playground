<?php

namespace Application\User;

use Domain\User\Repository\UserRepositoryInterface;

class LoginHandler
{
    /** @var UserRepositoryInterface  */
    private $userRepository;

    /**
     * LoginHandler constructor.
     * @param $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    /**
     * @param LoginCommand $command
     * @return bool
     */
    public function handle(LoginCommand $command): bool
    {
        $user = $this->userRepository->findOneByEmail($command->email());

        return ($user) ? true : false;
    }
}
