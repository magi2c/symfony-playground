<?php

namespace Application\User;

use Domain\User\Exception\UserInvalidPasswordException;
use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\Encoder\PasswordEncoderInterface;

class LoginHandler
{
    /** @var UserRepositoryInterface  */
    private $userRepository;

    /** @var PasswordEncoderInterface  */
    private $passwordEncoder;


    /**
     * LoginHandler constructor.
     * @param UserRepositoryInterface $userRepository
     * @param PasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        PasswordEncoderInterface $passwordEncoder
    ) {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
    }


    /**
     * @param LoginCommand $command
     * @return bool
     * @throws UserInvalidPasswordException
     */
    public function handle(LoginCommand $command): bool
    {
        $user = $this->userRepository->findOneByEmail($command->email());


        if (!$this->passwordEncoder->isPasswordValid(
                $user->password(),
                $command->password(),
                null
        )) {

            throw new UserInvalidPasswordException();
        }


        return ($user) ? true : false;
    }
}
