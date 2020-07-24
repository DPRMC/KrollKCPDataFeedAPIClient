<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;

class Client {


    const BASE_URI = 'https://kcp.krollbondratings.com/';


    /**
     * @var string The username given to you by Kroll.
     */
    protected $user;


    /**
     * @var string The password for the aforementioned username.
     */
    protected $pass;


    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;


    /**
     * @var string
     */
    protected $accessToken = '';

    /**
     * Client constructor.
     * @param string $user
     * @param string $pass
     */
    public function __construct( string $user, string $pass ) {
        $this->user = $user;
        $this->pass = $pass;

        $this->guzzle = new \GuzzleHttp\Client( [
                                                    // Base URI is used with relative requests
                                                    'base_uri' => self::BASE_URI,
                                                    // You can set any number of default request options.
                                                    'timeout'  => 2.0,
                                                ] );


        $response = $this->guzzle->request( 'POST', 'oauth', [
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->user,
                'client_secret' => $this->pass,
            ] ] );

        /**
         * Content-Type: application/json ... Content-Length: 111
         * {"access_token":"4ee0eec5250e729d3ae8f85c6a385dc82e91146f","expires_in":120,"token_type":"Bearer","scope":null}
         */

        var_dump( $response );

        $this->accessToken = ''; // @TODO pull access token from response and put here.
    }


    public function rss( Carbon $since = NULL ) {
        $response = $this->guzzle->request( 'POST', 'oauth/rss', [
            'query'       => [
                'access_token' => $this->accessToken,
            ],
            'form_params' => [
                'since' => $since ? $since->toRfc822String() : NULL,
            ] ] );

        // @todo process the list of links from the RSS endpoint.
    }

}