<?php

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\Client;
use DPRMC\KrollKCPDataFeedAPIClient\Deal;
use DPRMC\KrollKCPDataFeedAPIClient\DealEndpoint;
use DPRMC\KrollKCPDataFeedAPIClient\LoanGroup;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {

    protected static $client;

    protected static $debug = FALSE;


    public static function setUpBeforeClass(): void {
        self::$client = new Client( $_ENV[ 'KROLL_USER' ],
                                    $_ENV[ 'KROLL_PASS' ],
                                    self::$debug );
    }


    public function tearDown(): void {

    }


    /**
     * Of course in the set up code a client is already created, but that constructor
     * code isn't shown as being covered in the coverage report.
     * @test
     */
    public function constructorShouldCreateClient() {
        $client = new Client( $_ENV[ 'KROLL_USER' ], $_ENV[ 'KROLL_PASS' ] );
        $this->assertInstanceOf( Client::class, $client );
    }


    /**
     * @test
     * @group links2
     */
    public function callingRssShouldReturnLinks() {
        $endpoints = self::$client->rss();
        $this->assertIsArray( $endpoints );

        /**
         * @var DealEndpoint $firstEndpoint
         */
        $firstEndpoint             = array_shift( $endpoints );
        $firstEndpointUUID         = $firstEndpoint->uuid;
        $firstEndpointDownloadLink = DealEndpoint::getDownloadLink( $firstEndpointUUID );
        $this->assertInstanceOf( DealEndpoint::class, $firstEndpoint );
        $this->assertIsString( $firstEndpointDownloadLink );

        // Now get a limited set of endpoints
        $today         = Carbon::now();
        $since         = $today->subDays( 1 );
        $lessEndpoints = self::$client->rss( $since );
        $this->assertLessThan( count( $endpoints ), count( $lessEndpoints ) );

        /**
         * @var DealEndpoint $dealEndpoint
         */
        $dealEndpoint = array_shift( $lessEndpoints );
        $deal         = self::$client->downloadDeal( $dealEndpoint->uuid );
        $this->assertInstanceOf( Deal::class, $deal );


        $numBonds = $deal->getNumBonds();
        $this->assertIsInt( $numBonds );

        $numLoanGroups = $deal->getNumLoanGroups();
        $this->assertIsInt( $numLoanGroups );

        $loanGroups = $deal->loanGroups;
        /**
         * @var LoanGroup $loanGroup
         */
        $loanGroup        = array_shift( $loanGroups );
        $hasMultipleLoans = $loanGroup->hasMultipleLoans();
        $this->assertIsBool( $hasMultipleLoans );


    }


}