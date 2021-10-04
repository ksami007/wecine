<?php
namespace App\Tests\api;

use App\Tests\ApiTester;
use Codeception\Util\HttpCode;

class DbMoviesCest extends BaseCest
{
    public function testGetGenders(ApiTester $I)
    {
        $I->sendGET('/genders/list', []);
        $I->seeResponseIsJson(true);
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testGetMovies(ApiTester $I)
    {
        $I->sendGET('/movies/list', []);
        $I->seeResponseIsJson(true);
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testGetVideos(ApiTester $I)
    {
        $I->sendGET('/movies/videos/550988', []);
        $I->seeResponseIsJson(true);
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testGetBestMovie(ApiTester $I)
    {
        $I->sendGET('/movies/best', []);
        $I->seeResponseIsJson(true);
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testGetMovieDetails(ApiTester $I)
    {
        $I->sendGET('/movie/details/550988', []);
        $I->seeResponseIsJson(true);
        $I->seeResponseCodeIs(HttpCode::OK);
    }
}
