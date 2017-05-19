<?php

namespace Domain\Customer\Exception;

/**
 * Class CustomerNotFoundException
 * @package Domain\Catalog\Exception
 */
class CustomerNotFoundException extends \Exception
{
    /**
     * CustomerNotFoundException constructor.
     */
    public function __construct()
    { 
        parent::__construct('account.customer.exception.customer_not_found');
    }
}
