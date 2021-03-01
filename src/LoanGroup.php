<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;

class LoanGroup {

    public $uuid;
    public $name;
    public $city;
    public $state;
    public $property_type;
    public $size;
    public $kbra_value_per_size;
    public $kloc;
    public $kloc_reason;
    public $current_rank;
    public $percent_of_pool;
    public $probability_of_default;
    public $projected_time_to_default_months;
    public $estimated_time_to_resolution_months;
    public $current_upb;
    public $kltv;
    public $klgd;
    public $concluded_kcp_modeled_loss;
    public $projected_total_exposure;
    public $conservative_kcp_modeled_loss;
    public $optimistic_kcp_modeled_loss;
    public $additional_debt_senior_to_trust;
    public $additional_debt_sub_secured;
    public $additional_debt_sub_mezz;
    public $additional_debt_sub_unsecured;
    public $appraised_value;
    public $appraisal_date;
    public $kbra_concluded_value;
    public $valuation_method;
    public $kbra_conservative_value;
    public $conservative_valuation_method;
    public $kbra_optimistic_value;
    public $optimistic_valuation_method;
    public $pari_passu;
    public $pari_passu_id;
    public $total_pari_passu_debt;
    public $pari_deal_in_control;
    public $pari_kbra_master_deal;
    public $pari_passu_details;
    public $portfolio_level_valuation;
    public $url;
    public $maturity_outlook;
    public $current_revenue;
    public $current_expenses;
    public $current_ncf_dscr;
    public $current_ncf;
    public $current_noi;
    public $current_debt_service_amount;
    public $current_debt_yield_ncf;
    public $current_occupancy;
    public $current_occupancy_as_of_date;
    public $kbra_annualized_revenue;
    public $kbra_annualized_expenses;
    public $kbra_annualized_ncf;
    public $kbra_annualized_noi;
    public $kbra_annualized_as_of_date;
    public $kbra_annualized_statement_number_of_months;
    public $most_recent_revenue;
    public $most_recent_expenses;
    public $most_recent_noi;
    public $most_recent_ncf;
    public $most_recent_as_of_date;
    public $preceding_revenue;
    public $preceding_expenses;
    public $preceding_noi;
    public $preceding_ncf;
    public $preceding_as_of_date;
    public $kbra_commentary;

    // Fields that only seem to be present in (Paid Off Liquidated Loan Groups) PaidOffLiquidatedLoanGroups.
    public $master_loan_id_trepp;
    public $servicer_loan_id;
    public $prospectus_id;
    public $valuation_as_of_date;
    public $kbra_commentary_as_of_date;
    public $maturity_date;
    public $loss_severity_ending_balance;
    public $loss_severity_original_balance;
    public $disposition_type;
    // End PaidOffLiquidatedLoanGroups fields

    public $loans = [];


    /**
     * LoanGroup constructor.
     * @param array $loanGroup
     */
    public function __construct( array $loanGroup ) {
        $this->uuid                                       = Helper::convertElementToString( $loanGroup[ 'uuid' ] ?? NULL );
        $this->name                                       = Helper::convertElementToString( $loanGroup[ 'name' ] ?? NULL );
        $this->city                                       = Helper::convertElementToString( $loanGroup[ 'city' ] ?? NULL );
        $this->state                                      = Helper::convertElementToString( $loanGroup[ 'state' ] ?? NULL );
        $this->property_type                              = Helper::convertElementToString( $loanGroup[ 'property_type' ] ?? NULL );
        $this->size                                       = Helper::convertElementToString( $loanGroup[ 'size' ] ?? NULL );
        $this->kbra_value_per_size                        = Helper::convertElementToString( $loanGroup[ 'kbra_value_per_size' ] ?? NULL );
        $this->kloc                                       = Helper::convertElementToString( $loanGroup[ 'kloc' ] ?? NULL );
        $this->kloc_reason                                = Helper::convertElementToString( $loanGroup[ 'kloc_reason' ] ?? NULL );
        $this->current_rank                               = Helper::convertElementToString( $loanGroup[ 'current_rank' ] ?? NULL );
        $this->percent_of_pool                            = Helper::convertElementToString( $loanGroup[ 'percent_of_pool' ] ?? NULL );
        $this->probability_of_default                     = Helper::convertElementToString( $loanGroup[ 'probability_of_default' ] ?? NULL );
        $this->projected_time_to_default_months           = Helper::convertElementToString( $loanGroup[ 'projected_time_to_default_months' ] ?? NULL );
        $this->estimated_time_to_resolution_months        = Helper::convertElementToString( $loanGroup[ 'estimated_time_to_resolution_months' ] ?? NULL );
        $this->current_upb                                = Helper::convertElementToString( $loanGroup[ 'current_upb' ] ?? NULL );
        $this->kltv                                       = Helper::convertElementToString( $loanGroup[ 'kltv' ] ?? NULL );
        $this->klgd                                       = Helper::convertElementToString( $loanGroup[ 'klgd' ] ?? NULL );
        $this->concluded_kcp_modeled_loss                 = Helper::convertElementToString( $loanGroup[ 'concluded_kcp_modeled_loss' ] ?? NULL );
        $this->projected_total_exposure                   = Helper::convertElementToString( $loanGroup[ 'projected_total_exposure' ] ?? NULL );
        $this->conservative_kcp_modeled_loss              = Helper::convertElementToString( $loanGroup[ 'conservative_kcp_modeled_loss' ] ?? NULL );
        $this->optimistic_kcp_modeled_loss                = Helper::convertElementToString( $loanGroup[ 'optimistic_kcp_modeled_loss' ] ?? NULL );
        $this->additional_debt_senior_to_trust            = Helper::convertElementToString( $loanGroup[ 'additional_debt_senior_to_trust' ] ?? NULL );
        $this->additional_debt_sub_secured                = Helper::convertElementToString( $loanGroup[ 'additional_debt_sub_secured' ] ?? NULL );
        $this->additional_debt_sub_mezz                   = Helper::convertElementToString( $loanGroup[ 'additional_debt_sub_mezz' ] ?? NULL );
        $this->additional_debt_sub_unsecured              = Helper::convertElementToString( $loanGroup[ 'additional_debt_sub_unsecured' ] ?? NULL );
        $this->appraised_value                            = Helper::convertElementToString( $loanGroup[ 'appraised_value' ][ 'value' ] ?? NULL );
        $this->appraisal_date                             = empty( $loanGroup[ 'appraisal_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'appraisal_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_concluded_value                       = Helper::convertElementToString( $loanGroup[ 'kbra_concluded_value' ] ?? NULL );
        $this->valuation_method                           = Helper::convertElementToString( $loanGroup[ 'valuation_method' ] ?? NULL );
        $this->kbra_conservative_value                    = Helper::convertElementToString( $loanGroup[ 'kbra_conservative_value' ] ?? NULL );
        $this->conservative_valuation_method              = Helper::convertElementToString( $loanGroup[ 'conservative_valuation_method' ] ?? NULL );
        $this->kbra_optimistic_value                      = Helper::convertElementToString( $loanGroup[ 'kbra_optimistic_value' ] ?? NULL );
        $this->optimistic_valuation_method                = Helper::convertElementToString( $loanGroup[ 'optimistic_valuation_method' ] ?? NULL );
        $this->pari_passu                                 = Helper::convertElementToString( $loanGroup[ 'pari_passu' ] ?? NULL );
        $this->pari_passu_id                              = Helper::convertElementToString( $loanGroup[ 'pari_passu_id' ] ?? NULL );
        $this->total_pari_passu_debt                      = Helper::convertElementToString( $loanGroup[ 'total_pari_passu_debt' ] ?? NULL );
        $this->pari_deal_in_control                       = $loanGroup[ 'pari_deal_in_control' ] ?? NULL;
        $this->pari_kbra_master_deal                      = $loanGroup[ 'pari_kbra_master_deal' ] ?? NULL;
        $this->pari_passu_details                         = $loanGroup[ 'pari_passu_details' ] ?? NULL;
        $this->portfolio_level_valuation                  = Helper::convertElementToString( $loanGroup[ 'portfolio_level_valuation' ] ?? NULL );
        $this->url                                        = Helper::convertElementToString( $loanGroup[ 'url' ] ?? NULL );
        $this->maturity_outlook                           = Helper::convertElementToString( $loanGroup[ 'maturity_outlook' ] ?? NULL );
        $this->current_revenue                            = Helper::convertElementToString( $loanGroup[ 'current_revenue' ] ?? NULL );
        $this->current_expenses                           = Helper::convertElementToString( $loanGroup[ 'current_expenses' ] ?? NULL );
        $this->current_ncf_dscr                           = Helper::convertElementToString( $loanGroup[ 'current_ncf_dscr' ] ?? NULL );
        $this->current_ncf                                = Helper::convertElementToString( $loanGroup[ 'current_ncf' ] ?? NULL );
        $this->current_noi                                = Helper::convertElementToString( $loanGroup[ 'current_noi' ] ?? NULL );
        $this->current_debt_service_amount                = Helper::convertElementToString( $loanGroup[ 'current_debt_service_amount' ] ?? NULL );
        $this->current_debt_yield_ncf                     = Helper::convertElementToString( $loanGroup[ 'current_debt_yield_ncf' ] ?? NULL );
        $this->current_occupancy                          = Helper::convertElementToString( $loanGroup[ 'current_occupancy' ] ?? NULL );
        $this->current_occupancy_as_of_date               = empty( $loanGroup[ 'current_occupancy_as_of_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'current_occupancy_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_annualized_revenue                    = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_revenue' ] ?? NULL );
        $this->kbra_annualized_expenses                   = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_expenses' ] ?? NULL );
        $this->kbra_annualized_ncf                        = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_ncf' ] ?? NULL );
        $this->kbra_annualized_noi                        = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_noi' ] ?? NULL );
        $this->kbra_annualized_as_of_date                 = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_as_of_date' ] ?? NULL );
        $this->kbra_annualized_statement_number_of_months = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_statement_number_of_months' ] ?? NULL );
        $this->most_recent_revenue                        = Helper::convertElementToString( $loanGroup[ 'most_recent_revenue' ] ?? NULL );
        $this->most_recent_expenses                       = Helper::convertElementToString( $loanGroup[ 'most_recent_expenses' ] ?? NULL );
        $this->most_recent_noi                            = Helper::convertElementToString( $loanGroup[ 'most_recent_noi' ] ?? NULL );
        $this->most_recent_ncf                            = Helper::convertElementToString( $loanGroup[ 'most_recent_ncf' ] ?? NULL );
        $this->most_recent_as_of_date                     = empty( $loanGroup[ 'most_recent_as_of_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'most_recent_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->preceding_revenue                          = Helper::convertElementToString( $loanGroup[ 'preceding_revenue' ] ?? NULL );
        $this->preceding_expenses                         = Helper::convertElementToString( $loanGroup[ 'preceding_expenses' ] ?? NULL );
        $this->preceding_noi                              = Helper::convertElementToString( $loanGroup[ 'preceding_noi' ] ?? NULL );
        $this->preceding_ncf                              = Helper::convertElementToString( $loanGroup[ 'preceding_ncf' ] ?? NULL );
        $this->preceding_as_of_date                       = empty( $loanGroup[ 'preceding_as_of_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'preceding_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_commentary                            = Helper::convertElementToString( $loanGroup[ 'kbra_commentary' ] ?? NULL );

        // Fields that only seem to be present in (Paid Off Liquidated Loan Groups) PaidOffLiquidatedLoanGroups.
        $this->master_loan_id_trepp           = Helper::convertElementToString( $loanGroup[ 'master_loan_id_trepp' ] ?? NULL );
        $this->servicer_loan_id               = Helper::convertElementToString( $loanGroup[ 'servicer_loan_id' ] ?? NULL );
        $this->prospectus_id                  = Helper::convertElementToString( $loanGroup[ 'prospectus_id' ] ?? NULL );
        $this->valuation_as_of_date           = empty( $loanGroup[ 'valuation_as_of_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'valuation_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_commentary_as_of_date     = empty( $loanGroup[ 'kbra_commentary_as_of_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'kbra_commentary_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->maturity_date                  = empty( $loanGroup[ 'maturity_date' ] ) ? NULL : Carbon::parse( $loanGroup[ 'maturity_date' ], Helper::CARBON_TIMEZONE );
        $this->loss_severity_ending_balance   = Helper::convertElementToString( $loanGroup[ 'loss_severity_ending_balance' ] ?? NULL );
        $this->loss_severity_original_balance = Helper::convertElementToString( $loanGroup[ 'loss_severity_original_balance' ] ?? NULL );
        $this->disposition_type               = Helper::convertElementToString( $loanGroup[ 'disposition_type' ] ?? NULL );
        // End PaidOffLiquidatedLoanGroups fields

        $this->setLoans( $loanGroup );
    }


    /**
     * @param array $loanGroup
     */
    protected function setLoans( array $loanGroup ) {

        // I have seen examples where this element was not set, so exit this method early.
        if ( FALSE == isset( $loanGroup[ 'loans' ] ) || FALSE == isset( $loanGroup[ 'loans' ][ 'loan' ] ) ):
            return;
        endif;

        $loanOrLoans = $loanGroup[ 'loans' ][ 'loan' ];

        if ( $this->hasJustOneLoan( $loanGroup ) ):
            $this->loans[] = new Loan( $loanOrLoans );
        else:
            foreach ( $loanOrLoans as $i => $loanData ):
                $this->loans[] = new Loan( $loanData );
            endforeach;
        endif;
    }

    /**
     * If only one loan is present then all the fields for that one loan are jammed into the ['loans']['loan'] element.
     * @param $loanGroup
     * @return bool
     */
    private function hasJustOneLoan( $loanGroup ): bool {
        $loanOrLoans = $loanGroup[ 'loans' ][ 'loan' ];
        if ( isset( $loanOrLoans[ 'uuid' ] ) ):
            return TRUE;
        endif;
        return FALSE;
    }


    /**
     * @return bool
     */
    public function hasMultipleLoans(): bool {
        if ( count( $this->loans ) > 1 ):
            return TRUE;
        endif;
        return FALSE;
    }


    /**
     * I believe that Kroll may return multiple loan groups, and I think the format of the array changes.
     * To parse correctly, I think I need to check if only one loan group is present.
     * @TODO This might not be needed. Test when you find a Deal with multiple loan groups.
     * @param array $loanGroup
     * @return bool
     */
    public static function hasJustOneGroupInResults( array $loanGroup ): bool {
        // You will see UUID if only one loan group is present.
        if ( isset( $loanGroup[ 'uuid' ] ) ):
            return TRUE;
        endif;

        // You'll see some index if there are multiple loan groups.
        return FALSE;
    }

}