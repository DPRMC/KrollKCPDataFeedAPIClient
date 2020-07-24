<?php

namespace Tests;

use DPRMC\KrollKCPDataFeedAPIClient\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {


    public function setUp(): void {

    }


    public function tearDown(): void {

    }


    /**
     * @test
     */
    public function constructorShouldCreateClient() {
        $client = new Client( $_ENV[ 'KROLL_USER' ], $_ENV[ 'KROLL_PASS' ] );

        $this->assertInstanceOf( Client::class, $client );
    }


}