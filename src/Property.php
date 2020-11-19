<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

use Carbon\Carbon;

class Property {

    public $uuid; // Ex: 97b5dadb-ddba-552b-90ba-e57553bd94e2
    public $appraised_value_source; // Ex: reported
    public $appraised_value; // Ex: 2560000
    public $appraisal_date; // Ex: 2017-04-18, but I will convert to Carbon
    public $kbra_concluded_value; // Ex: 2700000
    public $valuation_method; // Ex: Direct Cap
    public $kbra_conservative_value; // Ex: 2700000
    public $conservative_valuation_method; // Ex: Direct Cap
    public $kbra_optimistic_value; // Ex: 2700000
    public $optimistic_valuation_method; // Ex: Direct Cap
    public $name; // Ex:
    public $city; // Ex:
    public $state; // Ex:
    public $property_type; // Ex: MF
    public $size; // Ex: 64
    public $kbra_value_per_size; // Ex: 42187.5
    public $current_revenue; // Ex: 552057
    public $current_expenses; // Ex: 367250.47
    public $current_ncf_dscr; // Ex: 3.28
    public $current_ncf; // Ex: 167270.53
    public $current_noi; // Ex: 184806.53
    public $current_debt_service_amount; // Ex: 51008.75
    public $current_debt_yield_ncf; // Ex: 12.87
    public $current_occupancy; // Ex: 100
    public $current_occupancy_as_of_date; // Ex: 2020-03-31, but I will convert to Carbon
    public $kbra_annualized_revenue; // Ex: 556950
    public $kbra_annualized_expenses; // Ex: 351201
    public $kbra_annualized_ncf; // Ex: 188213
    public $kbra_annualized_noi; // Ex: 205749
    public $kbra_annualized_as_of_date; // Ex: 2020-06-30, but I will convert to Carbon
    public $kbra_annualized_statement_number_of_months; // Ex: 6
    public $most_recent_revenue; // Ex: 278475
    public $most_recent_expenses; // Ex: 175600.5
    public $most_recent_noi; // Ex: 102874.5
    public $most_recent_ncf; // Ex: 94106.5
    public $most_recent_as_of_date; // Ex: 2020-06-30, but I will convert to Carbon
    public $preceding_revenue; // Ex: 552057
    public $preceding_expenses; // Ex: 367250.47
    public $preceding_noi; // Ex: 184807.28
    public $preceding_ncf; // Ex: 167270.53
    public $preceding_as_of_date; // Ex: 2019-12-31, but I will convert to Carbon
    public $trepp_property_id; // Ex:
    public $property_id; // Ex:
    public $direct_cap_value; // Ex: 2700000
    public $market_based_income_approach_value; // Ex:
    public $discounted_cash_flow_value; // Ex:
    public $sales_comparison_approach_value; // Ex:
    public $modeled_market_rent; // Ex: 718.82
    public $current_occupancy_for_dcf; // Ex: 100
    public $modeled_market_vacancy; // Ex: 6
    public $year_stabilized; // Ex: 3
    public $years_to_stabilize; // Ex: 2
    public $op_ex_ratio; // Ex: 67
    public $average_lease_term; // Ex:
    public $capital_reserves; // Ex: 250
    public $going_in_cap_rate; // Ex: 6.25
    public $terminal_cap_rate; // Ex: 6.75
    public $discount_rate; // Ex: 7.75
    public $tenant_retention; // Ex:
    public $rent_growth_year2; // Ex: 1.75
    public $rent_growth_year3; // Ex: 1.75
    public $rent_growth_year4; // Ex: 1.75
    public $rent_growth_year5; // Ex: 1.75
    public $average_rent_growth_years6to10; // Ex: 1.75
    public $expense_growth_year2; // Ex: 2.75
    public $expense_growth_year3; // Ex: 2.75
    public $expense_growth_year4; // Ex: 2.75
    public $expense_growth_year5; // Ex: 2.75
    public $average_expense_growth_years6to10; // Ex: 2.75
    public $comp1_price_per_size; // Ex:
    public $comp2_price_per_size; // Ex:
    public $comp3_price_per_size; // Ex:
    public $comp4_price_per_size; // Ex:
    public $comp1_distance; // Ex:
    public $comp2_distance; // Ex:
    public $comp3_distance; // Ex:
    public $comp4_distance; // Ex:
    public $comp1_net_adjustments; // Ex:
    public $comp2_net_adjustments; // Ex:
    public $comp3_net_adjustments; // Ex:
    public $comp4_net_adjustments; // Ex:
    public $pari_passu_details; // Ex: The example I found was an empty array with fields that were mirrored from above.


    public function __construct( array $propertyData ) {
        $this->uuid                                       = Helper::convertElementToString( $propertyData[ 'uuid' ] ); // Ex: 97b5dadb-ddba-552b-90ba-e57553bd94e2
        $this->appraised_value_source                     = Helper::convertElementToString( $propertyData[ 'appraised_value' ][ '@attributes' ][ 'source' ] ); // Ex: reported
        $this->appraised_value                            = Helper::convertElementToString( $propertyData[ 'appraised_value' ][ 'value' ] ); // Ex: 2560000
        $this->appraisal_date                             = Carbon::parse( $propertyData[ 'appraisal_date' ] ); // Ex: 2017-04-18, but I will convert to Carbon
        $this->kbra_concluded_value                       = Helper::convertElementToString( $propertyData[ 'kbra_concluded_value' ] ); // Ex: 2700000
        $this->valuation_method                           = Helper::convertElementToString( $propertyData[ 'valuation_method' ] ); // Ex: Direct Cap
        $this->kbra_conservative_value                    = Helper::convertElementToString( $propertyData[ 'kbra_conservative_value' ] ); // Ex: 2700000
        $this->conservative_valuation_method              = Helper::convertElementToString( $propertyData[ 'conservative_valuation_method' ] ); // Ex: Direct Cap
        $this->kbra_optimistic_value                      = Helper::convertElementToString( $propertyData[ 'kbra_optimistic_value' ] ); // Ex: 2700000
        $this->optimistic_valuation_method                = Helper::convertElementToString( $propertyData[ 'optimistic_valuation_method' ] ); // Ex: Direct Cap
        $this->name                                       = Helper::convertElementToString( $propertyData[ 'name' ] ); // Ex:
        $this->city                                       = Helper::convertElementToString( $propertyData[ 'city' ] ); // Ex:
        $this->state                                      = Helper::convertElementToString( $propertyData[ 'state' ] ); // Ex:
        $this->property_type                              = Helper::convertElementToString( $propertyData[ 'property_type' ] ); // Ex: MF
        $this->size                                       = Helper::convertElementToString( $propertyData[ 'size' ] ); // Ex: 64
        $this->kbra_value_per_size                        = Helper::convertElementToString( $propertyData[ 'kbra_value_per_size' ] ); // Ex: 42187.5
        $this->current_revenue                            = Helper::convertElementToString( $propertyData[ 'current_revenue' ] ); // Ex: 552057
        $this->current_expenses                           = Helper::convertElementToString( $propertyData[ 'current_expenses' ] ); // Ex: 367250.47
        $this->current_ncf_dscr                           = Helper::convertElementToString( $propertyData[ 'current_ncf_dscr' ] ); // Ex: 3.28
        $this->current_ncf                                = Helper::convertElementToString( $propertyData[ 'current_ncf' ] ); // Ex: 167270.53
        $this->current_noi                                = Helper::convertElementToString( $propertyData[ 'current_noi' ] ); // Ex: 184806.53
        $this->current_debt_service_amount                = Helper::convertElementToString( $propertyData[ 'current_debt_service_amount' ] ); // Ex: 51008.75
        $this->current_debt_yield_ncf                     = Helper::convertElementToString( $propertyData[ 'current_debt_yield_ncf' ] ); // Ex: 12.87
        $this->current_occupancy                          = Helper::convertElementToString( $propertyData[ 'current_occupancy' ] ); // Ex: 100
        $this->current_occupancy_as_of_date               = Carbon::parse( $propertyData[ 'current_occupancy_as_of_date' ] ); // Ex: 2020-03-31, but I will convert to Carbon
        $this->kbra_annualized_revenue                    = Helper::convertElementToString( $propertyData[ 'kbra_annualized_revenue' ] ); // Ex: 556950
        $this->kbra_annualized_expenses                   = Helper::convertElementToString( $propertyData[ 'kbra_annualized_expenses' ] ); // Ex: 351201
        $this->kbra_annualized_ncf                        = Helper::convertElementToString( $propertyData[ 'kbra_annualized_ncf' ] ); // Ex: 188213
        $this->kbra_annualized_noi                        = Helper::convertElementToString( $propertyData[ 'kbra_annualized_noi' ] ); // Ex: 205749
        $this->kbra_annualized_as_of_date                 = Carbon::parse( $propertyData[ 'kbra_annualized_as_of_date' ] ); // Ex: 2020-06-30, but I will convert to Carbon
        $this->kbra_annualized_statement_number_of_months = Helper::convertElementToString( $propertyData[ 'kbra_annualized_statement_number_of_months' ] ); // Ex: 6
        $this->most_recent_revenue                        = Helper::convertElementToString( $propertyData[ 'most_recent_revenue' ] ); // Ex: 278475
        $this->most_recent_expenses                       = Helper::convertElementToString( $propertyData[ 'most_recent_expenses' ] ); // Ex: 175600.5
        $this->most_recent_noi                            = Helper::convertElementToString( $propertyData[ 'most_recent_noi' ] ); // Ex: 102874.5
        $this->most_recent_ncf                            = Helper::convertElementToString( $propertyData[ 'most_recent_ncf' ] ); // Ex: 94106.5
        $this->most_recent_as_of_date                     = Carbon::parse( $propertyData[ 'most_recent_as_of_date' ] ); // Ex: 2020-06-30, but I will convert to Carbon
        $this->preceding_revenue                          = Helper::convertElementToString( $propertyData[ 'preceding_revenue' ] ); // Ex: 552057
        $this->preceding_expenses                         = Helper::convertElementToString( $propertyData[ 'preceding_expenses' ] ); // Ex: 367250.47
        $this->preceding_noi                              = Helper::convertElementToString( $propertyData[ 'preceding_noi' ] ); // Ex: 184807.28
        $this->preceding_ncf                              = Helper::convertElementToString( $propertyData[ 'preceding_ncf' ] ); // Ex: 167270.53
        $this->preceding_as_of_date                       = Carbon::parse( $propertyData[ 'preceding_as_of_date' ] ); // Ex: 2019-12-31, but I will convert to Carbon
        $this->trepp_property_id                          = Helper::convertElementToString( $propertyData[ 'trepp_property_id' ] ); // Ex:
        $this->property_id                                = Helper::convertElementToString( $propertyData[ 'property_id' ] ); // Ex:
        $this->direct_cap_value                           = Helper::convertElementToString( $propertyData[ 'direct_cap_value' ] ); // Ex: 2700000
        $this->market_based_income_approach_value         = Helper::convertElementToString( $propertyData[ 'market_based_income_approach_value' ] ); // Ex:
        $this->discounted_cash_flow_value                 = Helper::convertElementToString( $propertyData[ 'discounted_cash_flow_value' ] ); // Ex:
        $this->sales_comparison_approach_value            = Helper::convertElementToString( $propertyData[ 'sales_comparison_approach_value' ] ); // Ex:
        $this->modeled_market_rent                        = Helper::convertElementToString( $propertyData[ 'modeled_market_rent' ] ); // Ex: 718.82
        $this->current_occupancy_for_dcf                  = Helper::convertElementToString( $propertyData[ 'current_occupancy_for_dcf' ] ); // Ex: 100
        $this->modeled_market_vacancy                     = Helper::convertElementToString( $propertyData[ 'modeled_market_vacancy' ] ); // Ex: 6
        $this->year_stabilized                            = Helper::convertElementToString( $propertyData[ 'year_stabilized' ] ); // Ex: 3
        $this->years_to_stabilize                         = Helper::convertElementToString( $propertyData[ 'years_to_stabilize' ] ); // Ex: 2
        $this->op_ex_ratio                                = Helper::convertElementToString( $propertyData[ 'op_ex_ratio' ] ); // Ex: 67
        $this->average_lease_term                         = Helper::convertElementToString( $propertyData[ 'average_lease_term' ] ); // Ex:
        $this->capital_reserves                           = Helper::convertElementToString( $propertyData[ 'capital_reserves' ] ); // Ex: 250
        $this->going_in_cap_rate                          = Helper::convertElementToString( $propertyData[ 'going_in_cap_rate' ] ); // Ex: 6.25
        $this->terminal_cap_rate                          = Helper::convertElementToString( $propertyData[ 'terminal_cap_rate' ] ); // Ex: 6.75
        $this->discount_rate                              = Helper::convertElementToString( $propertyData[ 'discount_rate' ] ); // Ex: 7.75
        $this->tenant_retention                           = Helper::convertElementToString( $propertyData[ 'tenant_retention' ] ); // Ex:
        $this->rent_growth_year2                          = Helper::convertElementToString( $propertyData[ 'rent_growth_year2' ] ); // Ex: 1.75
        $this->rent_growth_year3                          = Helper::convertElementToString( $propertyData[ 'rent_growth_year3' ] ); // Ex: 1.75
        $this->rent_growth_year4                          = Helper::convertElementToString( $propertyData[ 'rent_growth_year4' ] ); // Ex: 1.75
        $this->rent_growth_year5                          = Helper::convertElementToString( $propertyData[ 'rent_growth_year5' ] ); // Ex: 1.75
        $this->average_rent_growth_years6to10             = Helper::convertElementToString( $propertyData[ 'average_rent_growth_years6to10' ] ); // Ex: 1.75
        $this->expense_growth_year2                       = Helper::convertElementToString( $propertyData[ 'expense_growth_year2' ] ); // Ex: 2.75
        $this->expense_growth_year3                       = Helper::convertElementToString( $propertyData[ 'expense_growth_year3' ] ); // Ex: 2.75
        $this->expense_growth_year4                       = Helper::convertElementToString( $propertyData[ 'expense_growth_year4' ] ); // Ex: 2.75
        $this->expense_growth_year5                       = Helper::convertElementToString( $propertyData[ 'expense_growth_year5' ] ); // Ex: 2.75
        $this->average_expense_growth_years6to10          = Helper::convertElementToString( $propertyData[ 'average_expense_growth_years6to10' ] ); // Ex: 2.75
        $this->comp1_price_per_size                       = Helper::convertElementToString( $propertyData[ 'comp1_price_per_size' ] ); // Ex:
        $this->comp2_price_per_size                       = Helper::convertElementToString( $propertyData[ 'comp2_price_per_size' ] ); // Ex:
        $this->comp3_price_per_size                       = Helper::convertElementToString( $propertyData[ 'comp3_price_per_size' ] ); // Ex:
        $this->comp4_price_per_size                       = Helper::convertElementToString( $propertyData[ 'comp4_price_per_size' ] ); // Ex:
        $this->comp1_distance                             = Helper::convertElementToString( $propertyData[ 'comp1_distance' ] ); // Ex:
        $this->comp2_distance                             = Helper::convertElementToString( $propertyData[ 'comp2_distance' ] ); // Ex:
        $this->comp3_distance                             = Helper::convertElementToString( $propertyData[ 'comp3_distance' ] ); // Ex:
        $this->comp4_distance                             = Helper::convertElementToString( $propertyData[ 'comp4_distance' ] ); // Ex:
        $this->comp1_net_adjustments                      = Helper::convertElementToString( $propertyData[ 'comp1_net_adjustments' ] ); // Ex:
        $this->comp2_net_adjustments                      = Helper::convertElementToString( $propertyData[ 'comp2_net_adjustments' ] ); // Ex:
        $this->comp3_net_adjustments                      = Helper::convertElementToString( $propertyData[ 'comp3_net_adjustments' ] ); // Ex:
        $this->comp4_net_adjustments                      = Helper::convertElementToString( $propertyData[ 'comp4_net_adjustments' ] ); // Ex:


        // @TODO We might want to break out the pari passu details into individual properties.
//        $this->pari_passu_details                         = Helper::convertElementToString( $propertyData[ 'pari_passu_details' ] ); // Ex: The example I found was an empty array with fields that were mirrored from above.
        $this->pari_passu_details = $propertyData[ 'pari_passu_details' ]; // Ex: The example I found was an empty array with fields that were mirrored from above.
    }


}