<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;
use DPRMC\KrollKCPDataFeedAPIClient\ToString\DealToString;


class Deal {

    /**
     * @var Carbon
     */
    public $remitDate;
    public $generatedDate;

    // Under the ['deal'] array
    public $uuid; // Ex: ecce6d9d-1938-5a43-8edc-cae17439e097
    public $name; // Ex: ?

    public $leadAnalyst;
    public $leadAnalystEmail;
    public $leadAnalystPhoneNumber;
    public $backupAnalyst;
    public $backupAnalystEmail;
    public $backupAnalystPhoneNumber;

    public $projectedLossPercentageCurrentBalance;
    public $projectedLossPercentageOriginalBalance;

    public $bonds      = [];
    public $loanGroups = [];
    public $paidOffLiquidatedLoanGroups;

    public function __construct( array $deal ) {

        $this->remitDate     = Carbon::parse( $deal[ 'remit_date' ], Helper::CARBON_TIMEZONE );
        $this->generatedDate = Carbon::parse( $deal[ 'generated_date' ], Helper::CARBON_TIMEZONE );

        $this->uuid = Helper::convertElementToString( $deal[ 'deal' ][ 'uuid' ] );
        $this->name = Helper::convertElementToString( $deal[ 'deal' ][ 'name' ] );

        $this->leadAnalyst            = Helper::convertElementToString( $deal[ 'lead_analyst' ] );
        $this->leadAnalystEmail       = Helper::convertElementToString( $deal[ 'lead_analyst_email' ] );
        $this->leadAnalystPhoneNumber = Helper::convertElementToString( $deal[ 'lead_analyst_phone_number' ] );

        $this->backupAnalyst            = Helper::convertElementToString( $deal[ 'backup_analyst' ] );
        $this->backupAnalystEmail       = Helper::convertElementToString( $deal[ 'backup_analyst_email' ] );
        $this->backupAnalystPhoneNumber = Helper::convertElementToString( $deal[ 'backup_analyst_phone_number' ] );

        $this->projectedLossPercentageCurrentBalance  = $deal[ 'projected_loss_percentage_current_balance' ];
        $this->projectedLossPercentageOriginalBalance = $deal[ 'projected_loss_percentage_original_balance' ];

        $this->bonds                       = $this->setBonds( $deal[ 'bonds' ][ 'bond' ] );
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
            $bonds[] = new Bond( $bondRow );
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