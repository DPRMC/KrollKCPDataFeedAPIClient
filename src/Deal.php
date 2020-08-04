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

    protected function setLoanGroups( array $loanGroupRowsOrJustOneGroup ): array {
        $loanGroups = [];

        if ( LoanGroup::hasJustOneGroupInResults( $loanGroupRowsOrJustOneGroup ) ):
            $loanGroups[] = new LoanGroup( $loanGroupRowsOrJustOneGroup );
        else:
            foreach ( $loanGroupRowsOrJustOneGroup as $loanGroup ):
                $loanGroups[] = new LoanGroup( $loanGroup );
            endforeach;
        endif;

        return $loanGroups;
    }


    /**
     * @return int
     */
    public function getNumLoanGroups(): int {
        return count( $this->loanGroups );
    }

}