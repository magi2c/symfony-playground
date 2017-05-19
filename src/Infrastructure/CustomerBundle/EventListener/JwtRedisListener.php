<?php

namespace Infrastructure\CustomerBundle\EventListener;

use Predis\Client;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTEncodedEvent;

/**
 * Class JwtRedisListener
 * @package Infrastructure\CustomerBundle\EventListener
 */
class JwtRedisListener
{

    /**
     * Redis session prefix
     */
    const SESSION_PREFIX = 'lb:account:session:';

    /**
     * @var Client
     */
    private $redisCli;

    /**
     * @var int
     */
    private $ttl;

    /**
     * JwtRedisListener constructor.
     *
     * @param Client    $redisCli
     * @param int       $ttl
     */
    public function __construct(Client $redisCli, $ttl)
    {
        $this->redisCli = $redisCli;
        $this->ttl = (int) $ttl;
    }

    /**
     * Store token on redis
     *
     * @param JWTEncodedEvent $event
     * @return mixed
     * @throws \Exception
     */
    public function onEncodeToken(JWTEncodedEvent $event)
    {
        return $this->redisCli->set(self::SESSION_PREFIX . $event->getJWTString(), true, "ex", $this->ttl);
    }
}
