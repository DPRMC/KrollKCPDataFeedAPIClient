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
    public $pub_date;


    /**
     * @var string The UUID portion of the link.
     */
    public $uuid;


    /**
     * So far I have seen 3 elements in the $item array: title, link, and pubDate
     * DealEndpoint constructor.
     * @param array $item
     */
    public function __construct( array $item ) {
        $this->title    = Helper::convertElementToString( $item[ 'title' ] );
        $this->link     = $item[ 'link' ];
        $this->pub_date = Carbon::parse( $item[ 'pubDate' ], Helper::CARBON_TIMEZONE );
        $this->uuid     = $this->getUuidFromLink( $item[ 'link' ] );
    }


    /**
     * @param string $link Ex: https://kcp.krollbondratings.com/oauth/download/76faf78d-3766-5173-94c1-bcb130479073
     * @return string The UUID is the last element of the link parameter.
     */
    protected function getUuidFromLink( string $link ): string {
        $parts = explode( '/', $link );
        return end( $parts );
    }


    /**
     * Simple concat function to create links to reports for download.
     * @param string $uuid
     * @return string
     */
    public static function getDownloadLink( string $uuid ): string {
        return Helper::DOWNLOAD_LINK_PREFIX . $uuid;
    }

}