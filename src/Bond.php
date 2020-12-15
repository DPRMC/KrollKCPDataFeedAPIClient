<?php

namespace DPRMC\KrollKCPDataFeedAPIClient;

class Bond {

    /** @var string Ex: 277c6c40-4bb1-5342-bec2-69dc88866a2f */
    public $uuid;

    /** @var string This has always been empty. */
    public $name;

    /** @var string This has always been empty as well. */
    public $kbra_credit_profile;

    /** @var int Ex: 119590000 */
    public $closing_balance;

    /** @var float Ex: 118633150.7 */
    public $current_balance;

    /** @var float Ex: 0.99 */
    public $factor;

    /** @var string Ex: 30298YAL7 */
    public $cusip;

    /** @var float Ex: 18.5 */
    public $closing_ce;

    /** @var float Ex: 18.51 */
    public $current_ce;

    /** @var float Ex: 118633150.7 */
    public $kbra_concluded_projected_balance;

    /** @var float Ex: 18.51 */
    public $kbra_concluded_ce;

    /** @var float Ex: 0.05 */
    public $kbra_concluded_ce_percent_change;

    /** @var bool Ex: 0 */
    public $kbra_concluded_defeasance_applied;

    /** @var bool Ex: 0 */
    public $kbra_concluded_prepayments_applied;

    /** @var bool Ex: 0 */
    public $kbra_concluded_losses_applied;

    /** @var float Ex: 118633150.7 */
    public $kbra_conservative_projected_balance;

    /** @var float Ex: 18.51 */
    public $kbra_conservative_ce;

    /** @var bool Ex: 0 */
    public $kbra_conservative_defeasance_applied;

    /** @var bool Ex: 0 */
    public $kbra_conservative_prepayments_applied;

    /** @var bool Ex: 0 */
    public $kbra_conservative_losses_applied;

    /** @var float Ex: 118633150.7 */
    public $kbra_optimistic_projected_balance;

    /** @var float Ex: 18.51 */
    public $kbra_optimistic_ce;

    /** @var bool Ex: 0 */
    public $kbra_optimistic_defeasance_applied;

    /** @var bool Ex: 0 */
    public $kbra_optimistic_prepayments_applied;

    /** @var bool Ex: 0 */
    public $kbra_optimistic_losses_applied;

    /** @var bool Ex: 0 */
    public $accumulated_interest_shortfalls;


    /**
     * Bond constructor.
     * @param array $bondData
     */
    public function __construct( array $bondData ) {

        $this->uuid                                  = Helper::convertElementToString( $bondData[ 'uuid' ] ?? NULL );
        $this->name                                  = Helper::convertElementToString( $bondData[ 'name' ] ?? NULL );
        $this->kbra_credit_profile                   = Helper::convertElementToString( $bondData[ 'kbra_credit_profile' ] ?? NULL );
        $this->closing_balance                       = Helper::convertElementToString( $bondData[ 'closing_balance' ] ?? NULL );
        $this->current_balance                       = Helper::convertElementToString( $bondData[ 'current_balance' ] ?? NULL );
        $this->factor                                = Helper::convertElementToString( $bondData[ 'factor' ] ?? NULL );
        $this->cusip                                 = Helper::convertElementToString( $bondData[ 'cusip' ] ?? NULL );
        $this->closing_ce                            = Helper::convertElementToString( $bondData[ 'closing_ce' ] ?? NULL );
        $this->current_ce                            = Helper::convertElementToString( $bondData[ 'current_ce' ] ?? NULL );
        $this->kbra_concluded_projected_balance      = Helper::convertElementToString( $bondData[ 'kbra_concluded_projected_balance' ] ?? NULL );
        $this->kbra_concluded_ce                     = Helper::convertElementToString( $bondData[ 'kbra_concluded_ce' ] ?? NULL );
        $this->kbra_concluded_ce_percent_change      = Helper::convertElementToString( $bondData[ 'kbra_concluded_ce_percent_change' ] ?? NULL );
        $this->kbra_concluded_defeasance_applied     = Helper::convertElementToString( $bondData[ 'kbra_concluded_defeasance_applied' ] ?? NULL );
        $this->kbra_concluded_prepayments_applied    = Helper::convertElementToString( $bondData[ 'kbra_concluded_prepayments_applied' ] ?? NULL );
        $this->kbra_concluded_losses_applied         = Helper::convertElementToString( $bondData[ 'kbra_concluded_losses_applied' ] ?? NULL );
        $this->kbra_conservative_projected_balance   = Helper::convertElementToString( $bondData[ 'kbra_conservative_projected_balance' ] ?? NULL );
        $this->kbra_conservative_ce                  = Helper::convertElementToString( $bondData[ 'kbra_conservative_ce' ] ?? NULL );
        $this->kbra_conservative_defeasance_applied  = Helper::convertElementToString( $bondData[ 'kbra_conservative_defeasance_applied' ] ?? NULL );
        $this->kbra_conservative_prepayments_applied = Helper::convertElementToString( $bondData[ 'kbra_conservative_prepayments_applied' ] ?? NULL );
        $this->kbra_conservative_losses_applied      = Helper::convertElementToString( $bondData[ 'kbra_conservative_losses_applied' ] ?? NULL );
        $this->kbra_optimistic_projected_balance     = Helper::convertElementToString( $bondData[ 'kbra_optimistic_projected_balance' ] ?? NULL );
        $this->kbra_optimistic_ce                    = Helper::convertElementToString( $bondData[ 'kbra_optimistic_ce' ] ?? NULL );
        $this->kbra_optimistic_defeasance_applied    = Helper::convertElementToString( $bondData[ 'kbra_optimistic_defeasance_applied' ] ?? NULL );
        $this->kbra_optimistic_prepayments_applied   = Helper::convertElementToString( $bondData[ 'kbra_optimistic_prepayments_applied' ] ?? NULL );
        $this->kbra_optimistic_losses_applied        = Helper::convertElementToString( $bondData[ 'kbra_optimistic_losses_applied' ] ?? NULL );
        $this->accumulated_interest_shortfalls       = Helper::convertElementToString( $bondData[ 'accumulated_interest_shortfalls' ] ?? NULL );
    }


}
