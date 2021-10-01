<?php

namespace App\Provider;

use GuzzleHttp\RequestOptions;

class MovieDbProvider extends AbstractHttpProvider
{
    const GENDERS_LIST_URI = 'genre/movie/list';
    const MOVIES_LIST = 'discover/movie';
    const TOP_RATED_MOVIES = 'movie/top_rated';
    const VIDEO_MOVIE = 'movie/<movie_id>/videos';

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
     * @param int $page
     * @return false|string
     */
    public function getTopRatedMovies(int $page = 1)
    {
        $params = [
            RequestOptions::QUERY => ['page' => $page]
        ];

        return $this->call(self::TOP_RATED_MOVIES, AbstractHttpProvider::GET_REQUEST, $params);
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
}
