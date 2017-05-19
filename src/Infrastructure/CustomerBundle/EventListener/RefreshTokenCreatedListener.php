<?php

namespace Infrastructure\CustomerBundle\EventListener;

use Domain\Security\Event\RefreshTokenCreatedEvent;
use Infrastructure\SecurityBundle\Manager\RefreshTokenManager;

/**
 * Class RefreshTokenCreatedListener
 * @package Infrastructure\CustomerBundle\EventListener
 */
class RefreshTokenCreatedListener
{
    /** @var RefreshTokenManager  */
    private $refreshTokenManager;

    /**
     * RefreshTokenCreatedListener constructor.
     * @param RefreshTokenManager $refreshTokenManager
     */
    public function __construct(RefreshTokenManager $refreshTokenManager)
    {
        $this->refreshTokenManager = $refreshTokenManager;
    }

    /**
     * @param RefreshTokenCreatedEvent $event
     * @return bool
     */
    public function onRefreshTokenCreated(RefreshTokenCreatedEvent $event)
    {
        return $this->refreshTokenManager->save($event->refreshToken(), $event->customerId());
    }
}
