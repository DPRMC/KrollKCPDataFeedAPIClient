<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;

class Loan {

    public $uuid;
    public $appraised_value;
    public $appraisal_date;
    public $kbra_concluded_value;
    public $valuation_method;
    public $kbra_conservative_value;
    public $conservative_valuation_method;
    public $kbra_optimistic_value;
    public $optimistic_valuation_method;
    public $name;
    public $city;
    public $state;
    public $property_type;
    public $size;
    public $kbra_value_per_size;
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
    public $current_upb;
    public $kltv;
    public $klgd;
    public $concluded_kcp_modeled_loss;
    public $projected_total_exposure;
    public $conservative_kcp_modeled_loss;
    public $optimistic_kcp_modeled_loss;
    public $average_rent_growth;
    public $average_expense_growth;
    public $master_loan_id_trepp;
    public $servicer_loan_id;
    public $prospectus_id;
    public $number_of_properties;
    public $maturity_date;
    public $servicer_status;
    public $ss;
    public $ss_transfer_date;
    public $servicer_commentary_period;
    public $servicer_commentary;
    public $pari_passu_details;
    public $properties;


    /**
     * Loan constructor.
     * @param array $loanData
     */
    public function __construct( array $loanData ) {

        $this->uuid                          = $loanData[ 'uuid' ];
        $this->appraised_value               = Helper::convertElementToString( $loanData[ 'appraised_value' ][ 'value' ] );
        $this->appraisal_date                = Carbon::parse( $loanData[ 'appraisal_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_concluded_value          = Helper::convertElementToString( $loanData[ 'kbra_concluded_value' ] );
        $this->valuation_method              = Helper::convertElementToString( $loanData[ 'valuation_method' ] );
        $this->kbra_conservative_value       = Helper::convertElementToString( $loanData[ 'kbra_conservative_value' ] );
        $this->conservative_valuation_method = Helper::convertElementToString( $loanData[ 'conservative_valuation_method' ] );
        $this->kbra_optimistic_value         = Helper::convertElementToString( $loanData[ 'kbra_optimistic_value' ] );
        $this->optimistic_valuation_method   = Helper::convertElementToString( $loanData[ 'optimistic_valuation_method' ] );
        $this->name                          = Helper::convertElementToString( $loanData[ 'name' ] );
        $this->city                          = Helper::convertElementToString( $loanData[ 'city' ] );
        $this->state                         = Helper::convertElementToString( $loanData[ 'state' ] );

        $this->property_type                              = Helper::convertElementToString( $loanData[ 'property_type' ] );
        $this->size                                       = Helper::convertElementToString( $loanData[ 'size' ] );
        $this->kbra_value_per_size                        = Helper::convertElementToString( $loanData[ 'kbra_value_per_size' ] );
        $this->current_revenue                            = Helper::convertElementToString( $loanData[ 'current_revenue' ] );
        $this->current_expenses                           = Helper::convertElementToString( $loanData[ 'current_expenses' ] );
        $this->current_ncf_dscr                           = Helper::convertElementToString( $loanData[ 'current_ncf_dscr' ] );
        $this->current_ncf                                = Helper::convertElementToString( $loanData[ 'current_ncf' ] );
        $this->current_noi                                = Helper::convertElementToString( $loanData[ 'current_noi' ] );
        $this->current_debt_service_amount                = Helper::convertElementToString( $loanData[ 'current_debt_service_amount' ] );
        $this->current_debt_yield_ncf                     = Helper::convertElementToString( $loanData[ 'current_debt_yield_ncf' ] );
        $this->current_occupancy                          = Helper::convertElementToString( $loanData[ 'current_occupancy' ] );
        $this->current_occupancy_as_of_date               = Carbon::parse( $loanData[ 'current_occupancy_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->kbra_annualized_revenue                    = Helper::convertElementToString( $loanData[ 'kbra_annualized_revenue' ] );
        $this->kbra_annualized_expenses                   = Helper::convertElementToString( $loanData[ 'kbra_annualized_expenses' ] );
        $this->kbra_annualized_ncf                        = Helper::convertElementToString( $loanData[ 'kbra_annualized_ncf' ] );
        $this->kbra_annualized_noi                        = Helper::convertElementToString( $loanData[ 'kbra_annualized_noi' ] );
        $this->kbra_annualized_as_of_date                 = Helper::convertElementToString( $loanData[ 'kbra_annualized_as_of_date' ] );
        $this->kbra_annualized_statement_number_of_months = Helper::convertElementToString( $loanData[ 'kbra_annualized_statement_number_of_months' ] );
        $this->most_recent_revenue                        = Helper::convertElementToString( $loanData[ 'most_recent_revenue' ] );
        $this->most_recent_expenses                       = Helper::convertElementToString( $loanData[ 'most_recent_expenses' ] );
        $this->most_recent_noi                            = Helper::convertElementToString( $loanData[ 'most_recent_noi' ] );
        $this->most_recent_ncf                            = Helper::convertElementToString( $loanData[ 'most_recent_ncf' ] );
        $this->most_recent_as_of_date                     = Carbon::parse( $loanData[ 'most_recent_as_of_date' ], Helper::CARBON_TIMEZONE );
        $this->preceding_revenue                          = Helper::convertElementToString( $loanData[ 'preceding_revenue' ] );
        $this->preceding_expenses                         = Helper::convertElementToString( $loanData[ 'preceding_expenses' ] );
        $this->preceding_noi                              = Helper::convertElementToString( $loanData[ 'preceding_noi' ] );
        $this->preceding_ncf                              = Helper::convertElementToString( $loanData[ 'preceding_ncf' ] );
        $this->preceding_as_of_date                       = Helper::convertElementToString( $loanData[ 'preceding_as_of_date' ] );
        $this->current_upb                                = Helper::convertElementToString( $loanData[ 'current_upb' ] );
        $this->kltv                                       = Helper::convertElementToString( $loanData[ 'kltv' ] );
        $this->klgd                                       = Helper::convertElementToString( $loanData[ 'klgd' ] );
        $this->concluded_kcp_modeled_loss                 = Helper::convertElementToString( $loanData[ 'concluded_kcp_modeled_loss' ] );
        $this->projected_total_exposure                   = Helper::convertElementToString( $loanData[ 'projected_total_exposure' ] );
        $this->conservative_kcp_modeled_loss              = Helper::convertElementToString( $loanData[ 'conservative_kcp_modeled_loss' ] );
        $this->optimistic_kcp_modeled_loss                = Helper::convertElementToString( $loanData[ 'optimistic_kcp_modeled_loss' ] );
        $this->average_rent_growth                        = Helper::convertElementToString( $loanData[ 'average_rent_growth' ] );
        $this->average_expense_growth                     = Helper::convertElementToString( $loanData[ 'average_expense_growth' ] );
        $this->master_loan_id_trepp                       = Helper::convertElementToString( $loanData[ 'master_loan_id_trepp' ] );
        $this->servicer_loan_id                           = Helper::convertElementToString( $loanData[ 'servicer_loan_id' ] );
        $this->prospectus_id                              = Helper::convertElementToString( $loanData[ 'prospectus_id' ] );
        $this->number_of_properties                       = Helper::convertElementToString( $loanData[ 'number_of_properties' ] );
        $this->maturity_date                              = Carbon::parse( $loanData[ 'maturity_date' ], Helper::CARBON_TIMEZONE );
        $this->servicer_status                            = Helper::convertElementToString( $loanData[ 'servicer_status' ] );
        $this->ss                                         = Helper::convertElementToString( $loanData[ 'ss' ] );
        $this->ss_transfer_date                           = Helper::convertElementToString( $loanData[ 'ss_transfer_date' ] );
        $this->servicer_commentary_period                 = Helper::convertElementToString( $loanData[ 'servicer_commentary_period' ] );
        $this->servicer_commentary                        = Helper::convertElementToString( $loanData[ 'servicer_commentary' ] );
        $this->pari_passu_details                         = $loanData[ 'pari_passu_details' ];

        $this->setProperties( $loanData );
    }


    /**
     * @param array $loanData
     */
    protected function setProperties( array $loanData ) {
        $propertyOrProperties = $loanData[ 'properties' ][ 'property' ];

        if ( $this->hasJustOneProperty( $loanData ) ):
            $this->properties[] = new Property( $propertyOrProperties );
        else:
            foreach ( $propertyOrProperties as $i => $loanData ):
                $this->properties[] = new Property( $loanData );
            endforeach;
        endif;
    }

    /**
     * If only one property is present then all the fields for that one property are jammed into the ['properties' ][ 'property'] element.
     * @param $loanGroup
     * @return bool
     */
    private function hasJustOneProperty( $loanGroup ): bool {
        $propertyOrProperties = $loanGroup[ 'properties' ][ 'property' ];
        if ( isset( $propertyOrProperties[ 'uuid' ] ) ):
            return TRUE;
        endif;
        return FALSE;
    }

}