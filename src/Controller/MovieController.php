<?php

namespace App\Controller;

use App\Manager\MovieManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class MovieController extends AbstractController
{
    /**
     * @var MovieManager
     */
    private $movieManager;

    /**
     * @param MovieManager $movieManager
     */
    public function __construct(
        MovieManager $movieManager
    )
    {
        $this->movieManager = $movieManager;
    }

    /**
     * @Route(
     *     path="/genders/list",
     *     name="genders_list",
     *     methods={"GET"},
     *     defaults={"_format": "json"}
     *     )
     *
     * @return JsonResponse
     */
    public function getGenders(): JsonResponse
    {
        try {
            $genders = $this->movieManager->retrieveGenders();
        } catch (\Exception $exception) {
            return new JsonResponse(
                ['message' => 'Unable to retrieve Genders from API'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->json($genders);
    }

    /**
     * @Route(
     *     path="/movies/list",
     *     name="movies_list",
     *     methods={"GET"},
     *     defaults={"_format": "json"}
     *     )
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getMovies(Request $request): JsonResponse
    {
        $page = (int) $request->query->get('page', 1);

        if (! is_integer($page)) {
            return new JsonResponse(['message' => 'Invalid page number'], Response::HTTP_BAD_REQUEST);
        }

        $search = $request->query->get('search');
        $withGenders = $request->query->get('with_genres');

        try {
            if ($search) { // $search cannot be null
                $movies = $this->movieManager->retrieveMoviesByKeywords($search, $page);
            } else {
                $movies = $this->movieManager->retrieveMovies($withGenders, $page);
            }
        } catch (\Exception $exception) {
            return new JsonResponse(
                ['message' => 'Unable to retrieve movies from API'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->json($movies);
    }

    /**
     * @Route(
     *     path="/movies/best",
     *     name="movies_best",
     *     methods={"GET"},
     *     defaults={"_format": "json"}
     *     )
     *
     * @return JsonResponse
     */
    public function getBestMovie(): JsonResponse
    {
        try {
            $bestMovie = $this->movieManager->retrieveBestMovie();
        } catch (\Exception $exception) {
            return new JsonResponse(
                ['message' => 'Unable to retrieve best movie from API'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->json($bestMovie);
    }

    /**
     * @Route(
     *     path="/movies/videos/{id}",
     *     name="movies_videos",
     *     methods={"GET"},
     *     defaults={"_format": "json"}
     *     )
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getVideos(int $id): JsonResponse
    {
        if (! is_integer($id)) {
            return new JsonResponse(['message' => 'Invalid movie id'], Response::HTTP_BAD_REQUEST);
        }

        try {
            $videos = $this->movieManager->retrieveVideosMovie($id);
        } catch (\Exception $exception) {
            return new JsonResponse(
                ['message' => sprintf('Unable to retrieve video movie for id %d from API', $id)],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return $this->json($videos);
    }
}
