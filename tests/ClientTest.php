<?php

namespace Tests;

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\Client;
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
     */
    public function callingRssShouldReturnLinks() {
//        $endpoints = self::$client->rss();
//        $this->assertIsArray( $endpoints );
//        $firstEndpoint = array_shift( $endpoints );
//        $this->assertInstanceOf( DealEndpoint::class, $firstEndpoint );

        // Now get a limited set of endpoints
        $today         = Carbon::now();
        $since         = $today->subDays( 1 );
        $lessEndpoints = self::$client->rss( $since );

        //$this->assertLessThan( count( $endpoints ), count( $lessEndpoints ) );


        $deal = self::$client->downloadDealEndpoint( array_shift( $lessEndpoints ) );

        print_r( $deal );

    }


}