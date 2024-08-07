<?php

namespace App\Libraries;

use Google\Client as Google_Client;
use Google\Service\Analytics as Google_Service_Analytics;

class GoogleAnalytics
{
    private $client;
    private $analytics;

  public function __construct()
{
    // Initialize the Google client
    $this->client = new Google_Client();
    $this->client->setAuthConfig(APPPATH . 'Config/client_secret_827758348721-utvai3fuca88hi0ulhdu9m7fn0179ju9.apps.googleusercontent.com.json');
    $this->client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
    $this->client->setAccessType('offline');
    $this->client->setPrompt('select_account consent');

    // Retrieve access token from session
    if (isset($_SESSION['access_token'])) {
        $this->client->setAccessToken($_SESSION['access_token']);
    }

    // Retrieve refresh token from session
    if (isset($_SESSION['refresh_token'])) {
        $this->client->refreshToken($_SESSION['refresh_token']);
    }

    // Initialize the Analytics service
    $this->analytics = new Google_Service_Analytics($this->client);
}



  public function authenticate($authCode)
{
    // Exchange authorization code for an access token
    $accessToken = $this->client->fetchAccessTokenWithAuthCode($authCode);

    // Set access token to client
    $this->client->setAccessToken($accessToken);

    // Save the token to a session or database for reuse
    $_SESSION['access_token'] = $accessToken;

    // Save refresh token if available
    if (isset($accessToken['refresh_token'])) {
        $_SESSION['refresh_token'] = $accessToken['refresh_token'];
    }
}



    public function setAccessToken($accessToken)
    {
        $this->client->setAccessToken($accessToken);
    }

    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }

 public function getSessions($viewId, $startDate, $endDate)
{
    // Check if access token is expired, refresh if necessary
    if ($this->client->isAccessTokenExpired()) {
        // Attempt to refresh the token using refresh token
        if (isset($_SESSION['refresh_token'])) {
            $this->client->refreshToken($_SESSION['refresh_token']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
        } else {
            throw new \Exception('Refresh token is missing.');
        }
    }

    // Make API request to get sessions
    $response = $this->analytics->data_ga->get(
        'ga:' . $viewId,
        $startDate,
        $endDate,
        'ga:sessions'
    );

    // Return sessions data
    return $response->getRows()[0][0];
}


}
