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


    /**
     * @var string The UUID portion of the link.
     */
    public $uuid;

    const DOWNLOAD_LINK_PREFIX = 'https://kcp.krollbondratings.com/oauth/download/';


    /**
     * So far I have seen 3 elements in the $item array: title, link, and pubDate
     * DealEndpoint constructor.
     * @param array $item
     */
    public function __construct( array $item ) {
        $this->title   = $this->getTitleFromItem( $item );
        $this->link    = $item[ 'link' ];
        $this->pubDate = Carbon::parse( $item[ 'pubDate' ] );
        $this->uuid    = $this->getUuidFromLink( $item[ 'link' ] );
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
     * @param string $link
     * @return string
     */
    protected function getUuidFromLink( string $link ): string {
        $parts = explode( '/', $link );
        return end( $parts );
    }


    /**
     * @param string $uuid
     * @return string
     */
    public static function getDownloadLink( string $uuid ): string {
        return self::DOWNLOAD_LINK_PREFIX . $uuid;
    }

}