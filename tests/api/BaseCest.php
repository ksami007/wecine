<?php

namespace App\Tests\api;

use App\Tests\ApiTester;

class BaseCest
{
    public function _before(ApiTester $I)
    {
        $token = $I->getUserToken();

        //we should login first
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->amBearerAuthenticated($token);
    }

    protected function beginCaptureContent(): void
    {
        ob_start();
    }

    /**
     * @return false|string
     */
    protected function finishCaptureContent()
    {
        $myContent = ob_get_contents();
        ob_end_clean();

        return $myContent;
    }
}
