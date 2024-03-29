<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;

class Client {


    const BASE_URI = 'https://kcp.krollbondratings.com/';


    /**
     * @var string The username given to you by Kroll.
     */
    protected $clientId;


    /**
     * @var string The password for the aforementioned username.
     */
    protected $clientSecret;


    /**
     * @var bool Set to true to enable Guzzle HTTP debugging.
     */
    protected $debug = FALSE;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzle;


    /**
     * @var string
     */
    protected $accessToken = '';


    /**
     * @var int How long the Bearer access token will stay valid.
     */
    protected $expiresIn;


    /**
     * @var string The type of access token returned. Should always be Bearer, I think...
     */
    protected $tokenType;


    /**
     * @var string|null Returned with the access token. I have only seen this be NULL.
     */
    protected $scope;


    /**
     * Client constructor.
     * @param string $user
     * @param string $pass
     * @param bool $debug
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __construct( string $user, string $pass, bool $debug = FALSE ) {
        $this->clientId     = $user;
        $this->clientSecret = $pass;
        $this->debug        = $debug;

        $this->guzzle = new \GuzzleHttp\Client( [
                                                    // Base URI is used with relative requests
                                                    'base_uri' => self::BASE_URI,
                                                    // You can set any number of default request options.
                                                    'timeout'  => 60.0,
                                                ] );


        $response = $this->guzzle->request( 'POST', 'oauth', [
            'debug'       => $this->debug,
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ] ] );

        /**
         * Content-Type: application/json ... Content-Length: 111
         * {"access_token":"4ee0eec5250e729d3ae8f85c6a385dc82e91146f","expires_in":120,"token_type":"Bearer","scope":null}
         */

        $json     = $response->getBody();
        $response = NULL; // Free up memory
        $array    = json_decode( $json, TRUE );
        // 2022-02-04:mdd They changed it back.
        $this->accessToken = $array[ 'access_token' ];
        $this->expiresIn   = $array[ 'expires_in' ];
        $this->tokenType   = $array[ 'token_type' ];
        $this->scope       = $array[ 'scope' ];

        // 2022-02-03:mdd They updated the names of the data they return.
//        $this->accessToken = $array[ 'access_token' ];
//        $this->expiresIn   = $array[ 'expires' ];
//        $this->tokenType   = $array[ 'type' ];
//        $this->scope       = $array[ 'scope' ];
    }


    /**
     * From the KROLL docs:
     * Note: We recommend that you initially call this end point without a SINCE date specified, to
     * receive all the publication events currently available. For subsequent calls, you should specify
     * the pubDate value from the RSS feed as the SINCE value. This will ensure that you only see new
     * events since your last request.
     * When calling without a SINCE date specified, you will only receive reports published in the
     * previous seven (7) days.
     *
     * The only data of use from this endpoint comes in the 'item' array.
     * Each 'item' contains a link to a report on a DEAL and it's publication date.
     * The other data looks like this, and is ignored:
     * [title]       => KCP Publication Feed
     * [link]        => https://kcp.krollbondratings.com/oauth/rss
     * [description] => Please contact kcphelp@kbra.com with any questions or concerns.
     * [pubDate]     => Fri, 20 Nov 20 12:18:31 -0500
     *
     * @param Carbon|null $since
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function rss( Carbon $since = NULL ): array {
        if ( $since ):
            $since = $since->toRfc822String();
        endif;

        $endpoints = [];
        $response  = $this->guzzle->request( 'GET', 'oauth/rss', [
            'debug' => $this->debug,
            'query' => [
                'access_token' => $this->accessToken,
                'since'        => $since,
            ],
        ] );

        $xmlString = $response->getBody();

        $xml      = simplexml_load_string( $xmlString, NULL, LIBXML_NOCDATA );
        $json     = json_encode( (array)$xml );
        $array    = json_decode( $json, TRUE );

        // 2022-11-17:mdd This request started returning no rows today.
        // We can still authenticate.
        // An email has been sent to Kroll to find out what is going on.
        if ( ! isset( $array[ 'channel' ] ) ):
            throw new \Exception("The 'channel' index was missing from the array. Response code: [" . $response->getStatusCode() . "] So maybe there were just now rows." );
        endif;

        $response = NULL; // Free up memory

        $items = $array[ 'channel' ][ 'item' ];

        foreach ( $items as $item ):
            $endpoints[] = new DealEndpoint( $item );
        endforeach;

        return $endpoints;
    }


    /**
     * @param string $uuid
     * @return Deal
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadDeal( string $uuid ): Deal {
        $link = Helper::DOWNLOAD_LINK_PREFIX . $uuid;

        $response = $this->guzzle->request( 'GET', $link, [
            'debug' => $this->debug,
            'query' => [
                'access_token' => $this->accessToken,
            ],
        ] );

        $xmlString = $response->getBody();
        $response  = NULL;
        $xml       = simplexml_load_string( $xmlString, NULL, LIBXML_NOCDATA );
        $json      = json_encode( (array)$xml );
        $array     = json_decode( $json, TRUE );

        return new Deal( $array );
    }

}
