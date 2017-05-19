<?php

namespace Infrastructure\CustomerBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

/**
 * Class JWTCreatedListener
 * @package Infrastructure\CustomerBundle\EventListener
 */
class JWTCreatedListener
{
    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event)
    {
        $payload = $event->getData();
        $payload['roles'] = $event->getUser()->customer()->roles();
        $payload['customer'] = $event->getUser()->customer()->id();
        $payload['organization'] = $event->getUser()->organization()->slug();

        $event->setData($payload);
    }
}
