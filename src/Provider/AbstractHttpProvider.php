<?php

namespace App\Provider;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractHttpProvider
{
    const GET_REQUEST = 'get';
    const TIMEOUT_TIME = 10; //seconds
    
    const ALLOWED_REQUEST_TYPES = [
        self::GET_REQUEST,
    ];

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        $this->client = new \GuzzleHttp\Client([
            'timeout' => static::TIMEOUT_TIME,
            'connect_timeout' => static::TIMEOUT_TIME
        ]);
    }

    abstract protected function generateParams(?array $parameters): array;

    /**
     * @param string $uri
     * @param string $requestType
     * @param array|null $parameters
     * @return false|string
     */
    public function call(
        string $uri,
        string $requestType,
        array $parameters = null
    ) {
        try {
            if (!in_array($requestType, self::ALLOWED_REQUEST_TYPES)) {
                throw new \Exception('Unexpected request type');
            }

            $res = $this->client->$requestType(
                sprintf('%s/%s', $this->url, $uri),
                $this->generateParams($parameters)
            );

            if ($res->getStatusCode() === Response::HTTP_OK) {
                return (string) $res->getBody();
            }
            
            throw new \Exception(
                sprintf(
                    "%s (%d) %s",
                    'Status code incorrect : ',
                    $res->getStatusCode(),
                    $res->getReasonPhrase()
                )
            );
        } catch (\Exception $exception) {
            $this->logger->error(
                sprintf(
                    'An error occurred %s',
                    $exception->getMessage()
                )
            );
        }
        
        return false;
    }
}
