<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;

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
            'form_params' => [
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ] ] );

        /**
         * Content-Type: application/json ... Content-Length: 111
         * {"access_token":"4ee0eec5250e729d3ae8f85c6a385dc82e91146f","expires_in":120,"token_type":"Bearer","scope":null}
         */

        $json  = $response->getBody();
        $array = json_decode( $json, TRUE );

        $this->accessToken = $array[ 'access_token' ];
        $this->expiresIn   = $array[ 'expires_in' ];
        $this->tokenType   = $array[ 'token_type' ];
        $this->scope       = $array[ 'scope' ];
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
        $xml       = simplexml_load_string( $xmlString );
        $json      = json_encode( $xml );
        $array     = json_decode( $json, TRUE );

        $items     = $array[ 'channel' ][ 'item' ];

        foreach ( $items as $item ):
            $endpoints[] = new DealEndpoint( $item );
        endforeach;

        return $endpoints;
    }


//    public function downloadDeal( string $uuid ) {
//        $link     = 'oauth/download/' . $uuid;
//        $response = $this->guzzle->request( 'GET', $link, [
//            'debug' => $this->debug,
//            'query' => [
//                'access_token' => $this->accessToken,
//            ],
//        ] );
//
//        $xmlString = $response->getBody();
//        $xml       = simplexml_load_string( $xmlString );
//        $json      = json_encode( $xml );
//        $array     = json_decode( $json, TRUE );
//
//
//        return new Deal( $array );
//
//        foreach ( $array as $key => $value ):
//            if ( is_array( $value ) ):
//                $count = count( $value );
//            else:
//                $count = $value;
//            endif;
//            echo "\n\n $key: " . $count;
//        endforeach;
//
//
//        echo "\n\ndeal index";
//        foreach ( $array[ 'deal' ] as $key => $value ):
//            if ( is_array( $value ) ):
//                $count = count( $value );
//            else:
//                $count = $value;
//            endif;
//            echo "\n $key: " . $count;
//        endforeach;
//
//
//        echo "\n\nbonds index";
//        foreach ( $array[ 'bonds' ] as $key => $value ):
//            if ( is_array( $value ) ):
//                $count = count( $value );
//            else:
//                $count = $value;
//            endif;
//            echo "\n $key: " . $count;
//        endforeach;
//
////        print_r($array);
//    }


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
        $xml       = simplexml_load_string( $xmlString );
        $json      = json_encode( $xml );
        $array     = json_decode( $json, TRUE );

        return new Deal( $array );
    }

}