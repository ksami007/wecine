<?php

namespace App\Provider;

use GuzzleHttp\RequestOptions;
use Psr\Log\LoggerInterface;

class MovieDbProvider extends AbstractHttpProvider
{
    const URL_BASE = 'https://api.themoviedb.org/3';

    const GENDERS_LIST_URI = 'genre/movie/list';
    const MOVIES_LIST = 'discover/movie';
    const MOVIES_SEARCH_LIST = 'search/movie';
    const MOST_POPULAR_MOVIES = 'movie/popular';
    const VIDEO_MOVIE = 'movie/<movie_id>/videos';
    const MOVIE_DETAILS = 'movie/<movie_id>';

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->url = static::URL_BASE;
    }

    /**
     * @param array|null $parameters
     * @return array
     */
    protected function generateParams(?array $parameters): array
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

    /**
     * @return false|string
     */
    public function getGendersFromApi()
    {
        return $this->call(self::GENDERS_LIST_URI, AbstractHttpProvider::GET_REQUEST);
    }

    /**
     * @param string|null $withGenders
     * @param int $page
     * @return false|string
     */
    public function getVideosFromApi(?string $withGenders, int $page)
    {
        $queryParams = ['page' => $page];

        if ($withGenders) {
            $queryParams['with_genres'] = $withGenders;
        }

        $params = [
            RequestOptions::QUERY => $queryParams
        ];

        return $this->call(self::MOVIES_LIST, AbstractHttpProvider::GET_REQUEST, $params);
    }

    /**
     * @param string $search
     * @param int $page
     * @return false|string
     */
    public function getVideosByKeywordsFromApi(string $search, int $page)
    {
        $params = [
            RequestOptions::QUERY => [
                'page' => $page,
                'query' => $search,
            ]
        ];

        return $this->call(self::MOVIES_SEARCH_LIST, AbstractHttpProvider::GET_REQUEST, $params);
    }

    /**
     * @param int $page
     * @return false|string
     */
    public function getMostPopularMovies(int $page = 1)
    {
        $params = [
            RequestOptions::QUERY => ['page' => $page]
        ];

        return $this->call(self::MOST_POPULAR_MOVIES, AbstractHttpProvider::GET_REQUEST, $params);
    }

    /**
     * @param int $id
     * @return false|string
     */
    public function getVideos(int $id)
    {
        $uri = str_replace(
            '<movie_id>',
            $id,
            self::VIDEO_MOVIE
        );

        return $this->call($uri, AbstractHttpProvider::GET_REQUEST);
    }

    /**
     * @param int $id
     * @return false|string
     */
    public function getVideoDetails(int $id)
    {
        $uri = str_replace(
            '<movie_id>',
            $id,
            self::MOVIE_DETAILS
        );

        return $this->call($uri, AbstractHttpProvider::GET_REQUEST);
    }
}
