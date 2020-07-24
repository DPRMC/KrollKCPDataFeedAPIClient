<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;


class Deal {

    public $bonds      = [];
    public $loanGroups = [];

    public function __construct( array $deal ) {
        $this->bonds      = $this->setBonds( $deal[ 'bonds' ][ 'bond' ] );
        $this->loanGroups = $this->setLoanGroups( $deal[ 'loan_groups' ][ 'loan_group' ] );
    }


    /**
     * @param array $bondRows
     * @return array
     */
    protected function setBonds( array $bondRows ): array {
        $bonds = [];
        foreach ( $bondRows as $bondRow ):
            $bonds[] = new Bond( $bondRow );
        endforeach;
        return $bonds;
    }

    protected function setLoanGroups( array $loanGroupRows ): array {

        $loanGroups = [];
        foreach ( $loanGroupRows as $loanGroup ):
            $loanGroups[] = new LoanGroup( $loanGroup );
        endforeach;
        return $loanGroups;
    }

}