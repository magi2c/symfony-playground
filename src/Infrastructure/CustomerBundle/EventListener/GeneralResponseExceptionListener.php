<?php

namespace Infrastructure\CustomerBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class GeneralResponseExceptionListener
 * @package Infrastructure\CustomerBundle\EventListener
 */
class GeneralResponseExceptionListener
{
    /**
     * This method is meant to intercept any stray application exception and transform it to
     * a convenient API response, ie strip internal exception messages and stack traces from the
     * responses and parse them to JSON.
     *
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $statusCode = $exception instanceof HttpException
            ? $exception->getStatusCode()
            : Response::HTTP_INTERNAL_SERVER_ERROR;

        $event->setResponse(new JsonResponse(
                [
                    'code'  => $statusCode,
                    'message' => $exception->getMessage()
                ],
                $statusCode
            )
        );
    }

}
