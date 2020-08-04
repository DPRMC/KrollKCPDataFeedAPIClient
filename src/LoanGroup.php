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

    public $loans = [];


    /**
     * LoanGroup constructor.
     * @param array $loanGroup
     */
    public function __construct( array $loanGroup ) {
        $this->uuid                                       = $loanGroup[ 'uuid' ];
        $this->name                                       = Helper::convertElementToString( $loanGroup[ 'name' ] );
        $this->city                                       = Helper::convertElementToString( $loanGroup[ 'city' ] );
        $this->state                                      = Helper::convertElementToString( $loanGroup[ 'state' ] );
        $this->property_type                              = $loanGroup[ 'property_type' ];
        $this->size                                       = $loanGroup[ 'size' ];
        $this->kbra_value_per_size                        = $loanGroup[ 'kbra_value_per_size' ];
        $this->kloc                                       = $loanGroup[ 'kloc' ];
        $this->kloc_reason                                = Helper::convertElementToString( $loanGroup[ 'kloc_reason' ] );
        $this->current_rank                               = $loanGroup[ 'current_rank' ];
        $this->percent_of_pool                            = $loanGroup[ 'percent_of_pool' ];
        $this->probability_of_default                     = Helper::convertElementToString( $loanGroup[ 'probability_of_default' ] );
        $this->projected_time_to_default_months           = Helper::convertElementToString( $loanGroup[ 'projected_time_to_default_months' ] );
        $this->estimated_time_to_resolution_months        = Helper::convertElementToString( $loanGroup[ 'estimated_time_to_resolution_months' ] );
        $this->current_upb                                = $loanGroup[ 'current_upb' ];
        $this->kltv                                       = $loanGroup[ 'kltv' ];
        $this->klgd                                       = $loanGroup[ 'klgd' ];
        $this->concluded_kcp_modeled_loss                 = $loanGroup[ 'concluded_kcp_modeled_loss' ];
        $this->projected_total_exposure                   = $loanGroup[ 'projected_total_exposure' ];
        $this->conservative_kcp_modeled_loss              = $loanGroup[ 'conservative_kcp_modeled_loss' ];
        $this->optimistic_kcp_modeled_loss                = $loanGroup[ 'optimistic_kcp_modeled_loss' ];
        $this->additional_debt_senior_to_trust            = $loanGroup[ 'additional_debt_senior_to_trust' ];
        $this->additional_debt_sub_secured                = $loanGroup[ 'additional_debt_sub_secured' ];
        $this->additional_debt_sub_mezz                   = $loanGroup[ 'additional_debt_sub_mezz' ];
        $this->additional_debt_sub_unsecured              = $loanGroup[ 'additional_debt_sub_unsecured' ];
        $this->appraised_value                            = $loanGroup[ 'appraised_value' ][ 'value' ];
        $this->appraisal_date                             = Carbon::parse( $loanGroup[ 'appraisal_date' ] );
        $this->kbra_concluded_value                       = $loanGroup[ 'kbra_concluded_value' ];
        $this->valuation_method                           = $loanGroup[ 'valuation_method' ];
        $this->kbra_conservative_value                    = $loanGroup[ 'kbra_conservative_value' ];
        $this->conservative_valuation_method              = $loanGroup[ 'conservative_valuation_method' ];
        $this->kbra_optimistic_value                      = $loanGroup[ 'kbra_optimistic_value' ];
        $this->optimistic_valuation_method                = $loanGroup[ 'optimistic_valuation_method' ];
        $this->pari_passu                                 = $loanGroup[ 'pari_passu' ];
        $this->pari_passu_id                              = Helper::convertElementToString( $loanGroup[ 'pari_passu_id' ] );
        $this->total_pari_passu_debt                      = Helper::convertElementToString( $loanGroup[ 'total_pari_passu_debt' ] );
        $this->pari_deal_in_control                       = $loanGroup[ 'pari_deal_in_control' ];
        $this->pari_kbra_master_deal                      = $loanGroup[ 'pari_kbra_master_deal' ];
        $this->pari_passu_details                         = $loanGroup[ 'pari_passu_details' ];
        $this->portfolio_level_valuation                  = $loanGroup[ 'portfolio_level_valuation' ];
        $this->url                                        = Helper::convertElementToString( $loanGroup[ 'url' ] );
        $this->maturity_outlook                           = Helper::convertElementToString( $loanGroup[ 'maturity_outlook' ] );
        $this->current_revenue                            = $loanGroup[ 'current_revenue' ];
        $this->current_expenses                           = $loanGroup[ 'current_expenses' ];
        $this->current_ncf_dscr                           = $loanGroup[ 'current_ncf_dscr' ];
        $this->current_ncf                                = $loanGroup[ 'current_ncf' ];
        $this->current_noi                                = $loanGroup[ 'current_noi' ];
        $this->current_debt_service_amount                = $loanGroup[ 'current_debt_service_amount' ];
        $this->current_debt_yield_ncf                     = $loanGroup[ 'current_debt_yield_ncf' ];
        $this->current_occupancy                          = $loanGroup[ 'current_occupancy' ];
        $this->current_occupancy_as_of_date               = Carbon::parse( $loanGroup[ 'current_occupancy_as_of_date' ] );
        $this->kbra_annualized_revenue                    = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_revenue' ] );
        $this->kbra_annualized_expenses                   = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_expenses' ] );
        $this->kbra_annualized_ncf                        = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_ncf' ] );
        $this->kbra_annualized_noi                        = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_noi' ] );
        $this->kbra_annualized_as_of_date                 = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_as_of_date' ] );
        $this->kbra_annualized_statement_number_of_months = Helper::convertElementToString( $loanGroup[ 'kbra_annualized_statement_number_of_months' ] );
        $this->most_recent_revenue                        = $loanGroup[ 'most_recent_revenue' ];
        $this->most_recent_expenses                       = $loanGroup[ 'most_recent_expenses' ];
        $this->most_recent_noi = $loanGroup[ 'most_recent_noi' ];
        $this->most_recent_ncf = $loanGroup[ 'most_recent_ncf' ];
        $this->most_recent_as_of_date = Carbon::parse( $loanGroup[ 'most_recent_as_of_date' ] );
        $this->preceding_revenue = $loanGroup[ 'preceding_revenue' ];
        $this->preceding_expenses = $loanGroup[ 'preceding_expenses' ];
        $this->preceding_noi = $loanGroup[ 'preceding_noi' ];
        $this->preceding_ncf = $loanGroup[ 'preceding_ncf' ];
        $this->preceding_as_of_date = Carbon::parse( $loanGroup[ 'preceding_as_of_date' ] );
        $this->kbra_commentary = Helper::convertElementToString( $loanGroup[ 'kbra_commentary' ] );


        $loanOrLoans = $loanGroup[ 'loans' ][ 'loan' ];

        if ( isset( $loanOrLoans[ 'uuid' ] ) ):
            $this->loans[] = new Loan( $loanOrLoans );
        else:
            foreach ( $loanOrLoans as $loanData ):
                $this->loans[] = new Loan( $loanData );
            endforeach;
        endif;


//
//        echo "\n\n";
//        var_dump("count: " . count($loanGroup[ 'loans' ][ 'loan' ]));
//        print_r(array_keys($loanGroup[ 'loans' ][ 'loan' ]));
//
//        if( count($loanGroup[ 'loans' ][ 'loan' ]) < 61):
//            print_r($loanGroup[ 'loans' ][ 'loan' ]);
////flush(); die();
//        endif;
//
//        $this->loans[] = new Loan( $loanGroup[ 'loans' ][ 'loan' ] );
    }


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