<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

class Helper {


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