<?php

namespace DPRMC\KrollKCPDataFeedAPIClient\ToString;

use DPRMC\KrollKCPDataFeedAPIClient\Deal;


class DealToString {

    public static function toString( Deal $deal ): string {

        $string = '';

        $string .= 'DEAL ' . str_repeat( '-', 96 );
        $string .= "\n";
        $string .= "uuid: " . $deal->uuid;
        $string .= "\n";
        $string .= "name: " . $deal->name;
        $string .= "\n";
        $string .= "remit date: " . $deal->remitDate->toCookieString();

        return $string;
    }

}