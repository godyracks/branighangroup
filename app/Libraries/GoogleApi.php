<?php
namespace App\Libraries;

use Google\Client;
use Google\Service\Oauth2;

class GoogleApi
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId('827758348721-jin605ivk47qavpv19g5hbvkktspoqbv.apps.googleusercontent.com');
        $this->client->setClientSecret('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');
        $this->client->setRedirectUri('https://branighangroup.com/google-callback');
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getLoginUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function authenticate($code)
    {
        $this->client->fetchAccessTokenWithAuthCode($code);
        return $this->client->getAccessToken();
    }

    public function getUserInfo()
    {
        $oauth2 = new Oauth2($this->client);
        return $oauth2->userinfo->get();
    }
}
