<?php

namespace Application\User;

class LoginHandler
{
    /**
     * @param LoginCommand $command
     * @return bool
     */
    public function handle(LoginCommand $command): bool
    {

        return ($command) ? true : false;
    }
}
