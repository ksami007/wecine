<?php

namespace App\Provider;

use GuzzleHttp\RequestOptions;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractHttpProvider
{
    const URL_BASE = 'https://api.themoviedb.org/3';
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
    private $logger;

    /**
     * @var string
     */
    private $url;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->url = static::URL_BASE;
        $this->logger = $logger;
        $this->client = new \GuzzleHttp\Client([
            'timeout' => static::TIMEOUT_TIME,
            'connect_timeout' => static::TIMEOUT_TIME
        ]);
    }

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

    /**
     * @return array[]
     */
    protected function generateCommonQueryOptions(): array
    {
        return [
            RequestOptions::QUERY => [
                'api_key' => $_ENV['THE_MOVIE_API_KEY'],
                'language' => 'fr'
            ],
        ];
    }

    /**
     * @param array|null $parameters
     * @return array
     */
    private function generateParams(?array $parameters): array
    {
        $headersParams = [
            'Accept' => 'application/json',
            'Authorization' => $_ENV['THE_MOVIE_JWT_TOKEN'],
            'Content-Type' => 'application/json;charset=utf-8',
        ];

        if (is_array($parameters) && isset($parameters[RequestOptions::HEADERS])) {
            $headersParams = array_merge($headersParams, $parameters[RequestOptions::HEADERS]);
        }

        $queryParams = [
            'api_key' => $_ENV['THE_MOVIE_API_KEY'],
            'language' => 'en',
        ];

        if (is_array($parameters) && isset($parameters[RequestOptions::QUERY])) {
            $queryParams = array_merge($queryParams, $parameters[RequestOptions::QUERY]);
        }

        return [
            RequestOptions::HEADERS => $headersParams,
            RequestOptions::QUERY => $queryParams,
        ];
    }
}
