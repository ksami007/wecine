<?php

namespace App\Tests;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class ApiTester extends \Codeception\Actor
{
    use _generated\ApiTesterActions;

    private $userToken = null;

    /**
     * @return string|null
     */
    public function getUserToken(): ?string
    {
        if ($this->userToken) {
            return $this->userToken;
        }
        $this->generateUserToken();

        return $this->userToken;
    }

    /**
     * This method will generate a user token.
     */
    private function generateUserToken()
    {
        $username = 'wecine';
        $password = 'wecine';
        $I = $this;

        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendPOST('/login_check', ['username' => $username, 'password' => $password]);
        $response = $I->grabResponse();
        $responseArray = json_decode($response, true);

        if (is_array($responseArray) && isset($responseArray['token'])) {
            $this->userToken = $responseArray['token'];
        }
    }
}
