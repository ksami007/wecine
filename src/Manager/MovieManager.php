<?php

namespace App\Manager;

use App\Provider\MovieDbProvider;

class MovieManager
{
    /**
     * @var MovieDbProvider
     */
    private $movieDbProvider;

    /**
     * @param MovieDbProvider $movieDbProvider
     */
    public function __construct(MovieDbProvider $movieDbProvider)
    {
        $this->movieDbProvider = $movieDbProvider;
    }

    /**
     * @throws \Exception
     */
    public function retrieveGenders()
    {
        $genders = $this->movieDbProvider->getGendersFromApi();

        if (!$genders) {
            throw new \Exception();
        }

        return json_decode($genders);
    }

    /**
     * @param string|null $withGenders
     * @param int $page
     * @return mixed
     * @throws \Exception
     */
    public function retrieveMovies(?string $withGenders, int $page)
    {
        $movies = $this->movieDbProvider->getVideosFromApi($withGenders, $page);

        if (!$movies) {
            throw new \Exception();
        }

        return json_decode($movies);
    }

    /**
     * @param string $search
     * @param int $page
     * @return mixed
     * @throws \Exception
     */
    public function retrieveMoviesByKeywords(string $search, int $page)
    {
        $movies = $this->movieDbProvider->getVideosByKeywordsFromApi($search, $page);

        if (!$movies) {
            throw new \Exception();
        }

        return json_decode($movies);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function retrieveBestMovie()
    {
        $topRated = $this->movieDbProvider->getTopRatedMovies();

        if (!$topRated) {
            throw new \Exception();
        }

        $bestMovies = json_decode($topRated);

        if (!property_exists($bestMovies, 'results')) {
            throw new \Exception();
        }

        return $bestMovies->results[0];
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function retrieveVideosMovie(int $id)
    {
        $videos = $this->movieDbProvider->getVideos($id);

        if (!$videos) {
            throw new \Exception();
        }

        $videos = json_decode($videos);

        if (!property_exists($videos, 'results')) {
            throw new \Exception();
        }

        return $videos->results;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Exception
     */
    public function retrieveMovie(int $id)
    {
        $video = $this->movieDbProvider->getVideoDetails($id);

        if (!$video) {
            throw new \Exception();
        }

        return json_decode($video);
    }
}
