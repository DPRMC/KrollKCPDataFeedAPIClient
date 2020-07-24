<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;


class Deal {

    public $bonds      = [];
    public $loanGroups = [];

    public function __construct( array $deal ) {


    }


    protected function setBonds( array $bondRows ): array {
        $bonds = [];
        foreach ( $bondRows as $bondRow ):
            $bonds[] = new Bond( $bondRow );
        endforeach;
    }

}