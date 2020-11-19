<?php

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\Client;
use DPRMC\KrollKCPDataFeedAPIClient\Deal;
use DPRMC\KrollKCPDataFeedAPIClient\DealEndpoint;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase {


    public static function setUpBeforeClass(): void {

    }


    public function tearDown(): void {

    }


    /**
     * @test
     * @group helper
     */
    public function convertShouldCreateEmptyStringFromEmptyArray() {
        $element = [];
        $result  = \DPRMC\KrollKCPDataFeedAPIClient\Helper::convertElementToString( $element );
        $this->assertEmpty( $result );
    }


    /**
     * @test
     * @group helper
     */
    public function convertShouldCreateEmptyStringFromEmptyString() {
        $element = '';
        $result  = \DPRMC\KrollKCPDataFeedAPIClient\Helper::convertElementToString( $element );
        $this->assertEmpty( $result );
    }


    /**
     * @test
     * @group helper
     */
    public function convertShouldCreateConcatenatedStringFromNonEmptyArray() {
        $element = [ 'a', 'b' ];
        $result  = \DPRMC\KrollKCPDataFeedAPIClient\Helper::convertElementToString( $element );
        $this->assertEquals( 'a b', $result );
    }


    /**
     * @test
     * @group helper
     */
    public function convertShouldCreateFloatFromNumeric() {
        $element = 1234.56;
        $result  = \DPRMC\KrollKCPDataFeedAPIClient\Helper::convertElementToString( $element );
        $this->assertIsFloat( $result );
    }


}