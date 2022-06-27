<?php

/** @noinspection ReturnTypeCanBeDeclaredInspection */
/** @noinspection PhpMissingReturnTypeInspection */

declare(strict_types = 1);

namespace App\HttpCache;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpCache\HttpCache;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategyInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * @see https://github.com/symfony/symfony/pull/42355
 */
class Esi extends \Symfony\Component\HttpKernel\HttpCache\Esi
{
    public function createCacheStrategy(): ResponseCacheStrategyInterface
    {
        // a 500 is also triggered if using the unmodified strategy and sending an "If-Modified-Since"  header
        //return new \Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy();

        return new ResponseCacheStrategy();
    }

    /* Uncomment this to un-break ESI.
     */
    /*
    public function handle(HttpCache $cache, string $uri, string $alt, bool $ignoreErrors): string
    {
        $subRequest = Request::create($uri, Request::METHOD_GET, [], $cache->getRequest()->cookies->all(), [], $cache->getRequest()->server->all());

        try {
            $response = $cache->handle($subRequest, HttpKernelInterface::SUB_REQUEST, true);

            if (!$response->isSuccessful() && $response->getStatusCode() !== Response::HTTP_NOT_MODIFIED) {
                throw new \RuntimeException(sprintf('Error when rendering "%s" (Status code is %d).', $subRequest->getUri(), $response->getStatusCode()));
            }

            return $response->getContent();
        } catch (\Exception $e) {
            if ($alt) {
                return $this->handle($cache, $alt, '', $ignoreErrors);
            }

            if (!$ignoreErrors) {
                throw $e;
            }
        }

        return '';
    }
    */
}
