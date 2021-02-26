<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\ToString\DealToString;


class Deal {

    /**
     * @var Carbon
     */
    public $remit_date;
    public $generated_date;

    // Under the ['deal'] array
    public $uuid; // Ex: ecce6d9d-1938-5a43-8edc-cae17439e097
    public $name; // Ex: ?

    public $lead_analyst;
    public $lead_analyst_email;
    public $lead_analyst_phone_number;
    public $backup_analyst;
    public $backup_analyst_email;
    public $backup_analyst_phone_number;

    public $projected_loss_percentage_current_balance;
    public $projected_loss_percentage_original_balance;

    public $bonds      = [];
    public $loanGroups = [];
    public $paidOffLiquidatedLoanGroups;

    public function __construct( array $deal ) {

        $this->remit_date     = Carbon::parse( $deal[ 'remit_date' ], Helper::CARBON_TIMEZONE );
        $this->generated_date = Carbon::parse( $deal[ 'generated_date' ], Helper::CARBON_TIMEZONE );

        $this->uuid = Helper::convertElementToString( $deal[ 'deal' ][ 'uuid' ] );
        $this->name = Helper::convertElementToString( $deal[ 'deal' ][ 'name' ] );

        $this->lead_analyst              = Helper::convertElementToString( $deal[ 'lead_analyst' ] );
        $this->lead_analyst_email        = Helper::convertElementToString( $deal[ 'lead_analyst_email' ] );
        $this->lead_analyst_phone_number = Helper::convertElementToString( $deal[ 'lead_analyst_phone_number' ] );

        $this->backup_analyst              = Helper::convertElementToString( $deal[ 'backup_analyst' ] );
        $this->backup_analyst_email        = Helper::convertElementToString( $deal[ 'backup_analyst_email' ] );
        $this->backup_analyst_phone_number = Helper::convertElementToString( $deal[ 'backup_analyst_phone_number' ] );

        $this->projected_loss_percentage_current_balance  = $deal[ 'projected_loss_percentage_current_balance' ];
        $this->projected_loss_percentage_original_balance = $deal[ 'projected_loss_percentage_original_balance' ];


        if ( is_array( $deal[ 'bonds' ][ 'bond' ] ) ):
            $this->bonds = $this->setBonds( $deal[ 'bonds' ][ 'bond' ] );
        endif;


        $this->loanGroups                  = $this->setLoanGroups( $deal );
        $this->paidOffLiquidatedLoanGroups = $this->setPaidOffLiquidatedLoanGroups( $deal );
    }


    public function __toString() {
        return DealToString::toString( $this );
    }


    /**
     * @param array $bondRows
     * @return array
     */
    protected function setBonds( array $bondRows ): array {
        $bonds = [];
        foreach ( $bondRows as $bondRow ):

            if ( is_array( $bondRow ) ):
                $bonds[] = new Bond( $bondRow );
            endif;
        endforeach;
        return $bonds;
    }

    protected function setLoanGroups( array $deal ): array {

        // Just a bit of error checking. I have seen examples where 'loan_groups' was not set.
        if ( !isset( $deal[ 'loan_groups' ] ) || !isset( $deal[ 'loan_groups' ][ 'loan_group' ] ) ):
            return [];
        endif;
        $loanGroupRowsOrJustOneGroup = $deal[ 'loan_groups' ][ 'loan_group' ];


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


    protected function setPaidOffLiquidatedLoanGroups( array $loanGroupRowsOrJustOneGroup ): array {
        // Just a bit of error checking. I have seen examples where 'loan_groups' was not set.
        if ( !isset( $deal[ 'paid_off_liquidated_loan_groups' ] ) ):
            return [];
        endif;
        $loanGroupRowsOrJustOneGroup = $deal[ 'paid_off_liquidated_loan_groups' ];

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
    public function getNumBonds(): int {
        return count( $this->bonds );
    }


    /**
     * @return int
     */
    public function getNumLoanGroups(): int {
        return count( $this->loanGroups );
    }

}