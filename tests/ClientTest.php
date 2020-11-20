<?php

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\Client;
use DPRMC\KrollKCPDataFeedAPIClient\Deal;
use DPRMC\KrollKCPDataFeedAPIClient\DealEndpoint;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {

    protected static $client;


    public static function setUpBeforeClass(): void {
        self::$client = new Client( $_ENV[ 'KROLL_USER' ], $_ENV[ 'KROLL_PASS' ] );
    }


    public function tearDown(): void {

    }


    /**
     * @test
     */
    public function constructorShouldCreateClient() {
        $this->assertInstanceOf( Client::class, self::$client );
    }


    /**
     * @test
     * @group links
     */
    public function callingRssShouldReturnLinks() {
        $endpoints = self::$client->rss();
        $this->assertIsArray( $endpoints );
        $firstEndpoint = array_shift( $endpoints );

        $this->assertInstanceOf( DealEndpoint::class, $firstEndpoint );

        // Now get a limited set of endpoints
        $today         = Carbon::now();
        $since         = $today->subDays( 1 );
        $lessEndpoints = self::$client->rss( $since );

        $this->assertLessThan( count( $endpoints ), count( $lessEndpoints ) );

        /**
         * @var DealEndpoint $dealEndpoint
         */
        $dealEndpoint = array_shift( $lessEndpoints );

        $deal = self::$client->downloadDeal( $dealEndpoint->uuid );

        $this->assertInstanceOf( Deal::class, $deal );

        echo $deal;

    }


    /**
     * @test
     * @group deal
     */
    public function downloadingEndpointShouldReturnDeal() {
        $today         = Carbon::now();
        $since         = $today->subDays( 1 );
        $lessEndpoints = self::$client->rss( $since );

        //https://kcp.krollbondratings.com/oauth/download/94f746ec-f0ad-5a9b-8439-50a845a2954c

        //array_shift( $lessEndpoints )->link

        $deal = self::$client->downloadDeal( '94f746ec-f0ad-5a9b-8439-50a845a2954c' );

        $this->assertInstanceOf( Deal::class, $deal );
    }


    /**
     * @test
     * @group test
     */
    public function showLinks() {
        $today         = Carbon::now();
        $since         = $today->subDays( 1 );
        $lessEndpoints = self::$client->rss( $since );

        print_r( $lessEndpoints );
    }


}