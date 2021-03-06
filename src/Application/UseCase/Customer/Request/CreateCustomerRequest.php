<?php

namespace Application\UseCase\Customer\Request;

use Domain\Customer\Model\Customer;

/**
 * Class CreateCustomerRequest
 *
 * @package Application\UseCase\Customer\Request
 */
class CreateCustomerRequest
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * CreateCustomerRequest constructor.
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        string $email,
        string $firstName,
        string $lastName
    ) {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function toModel()
    {
        return new Customer(
            $this->email,
            $this->firstName,
            $this->lastName
        );
    }

}
