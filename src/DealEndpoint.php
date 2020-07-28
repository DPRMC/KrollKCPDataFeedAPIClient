<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;


/**
 * Class DealEndpoint
 * @package DPRMC\KrollKCPDataFeedAPIClient
 */
class DealEndpoint {

    /**
     * @var string These have been returned as blanks so far.
     */
    public $title;


    /**
     * @var string This will be used to pull down the report for this security.
     */
    public $link;


    /**
     * @var Carbon The date and time that this report was published.
     */
    public $pubDate;

    const link    = 'link';
    const pubDate = 'pubDate';
    const uuid    = 'uuid';


    /**
     * So far I have seen 3 elements in the $item array: title, link, and pubDate
     * DealEndpoint constructor.
     * @param array $item
     */
    public function __construct( array $item ) {
        $this->title   = $this->getTitleFromItem( $item );
        $this->link    = $item[ 'link' ];
        $this->pubDate = Carbon::parse( $item[ 'pubDate' ] );
    }


    /**
     * I have seen the title element get parsed as an empty array from the API.
     * Deal with that here, because we want to save a string for the title.
     * @param $item
     * @return string
     */
    protected function getTitleFromItem( $item ): string {
        $title = $item[ 'title' ];
        if ( is_array( $title ) ):
            return implode( ' ', $title );
        endif;
        return (string)$title;
    }

    /**
     * @return string The UUID of the endpoint to be downloaded.1
     */
    public function uuid(): string {
        $parts = explode( '/', $this->link );
        return end( $parts );
    }

}