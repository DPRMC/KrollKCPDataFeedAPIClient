<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

class Helper {

    /**
     * Used to create the link to reports for download.
     */
    const DOWNLOAD_LINK_PREFIX = 'https://kcp.krollbondratings.com/oauth/download/';

    /**
     * When parsing dates into Carbon objects, let's use one constant timezone.
     */
    const CARBON_TIMEZONE = 'America/New_York';

    /**
     * During the parsing of the XML returned from their API, sometimes
     * empty arrays are added as values.
     * I think this is happening when the XML value is null or blank.
     * @param $element
     * @return string|float
     */
    public static function convertElementToString( $element ) {
        if ( is_array( $element ) ):
            return implode( ' ', $element );
        endif;

        if ( is_numeric( $element ) ):
            return (float)$element;
        endif;

        return (string)$element;
    }
}