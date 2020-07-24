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
        $this->uuid                                  = $bondData[ 'uuid' ];
        $this->name                                  = Helper::convertElementToString( $bondData[ 'name' ] );
        $this->kbra_credit_profile                   = Helper::convertElementToString( $bondData[ 'kbra_credit_profile' ] );
        $this->closing_balance                       = $bondData[ 'closing_balance' ];
        $this->current_balance                       = $bondData[ 'current_balance' ];
        $this->factor                                = $bondData[ 'factor' ];
        $this->cusip                                 = $bondData[ 'cusip' ];
        $this->closing_ce                            = $bondData[ 'closing_ce' ];
        $this->current_ce                            = $bondData[ 'current_ce' ];
        $this->kbra_concluded_projected_balance      = $bondData[ 'kbra_concluded_projected_balance' ];
        $this->kbra_concluded_ce                     = $bondData[ 'kbra_concluded_ce' ];
        $this->kbra_concluded_ce_percent_change      = $bondData[ 'kbra_concluded_ce_percent_change' ];
        $this->kbra_concluded_defeasance_applied     = $bondData[ 'kbra_concluded_defeasance_applied' ];
        $this->kbra_concluded_prepayments_applied    = $bondData[ 'kbra_concluded_prepayments_applied' ];
        $this->kbra_concluded_losses_applied         = $bondData[ 'kbra_concluded_losses_applied' ];
        $this->kbra_conservative_projected_balance   = $bondData[ 'kbra_conservative_projected_balance' ];
        $this->kbra_conservative_ce                  = $bondData[ 'kbra_conservative_ce' ];
        $this->kbra_conservative_defeasance_applied  = $bondData[ 'kbra_conservative_defeasance_applied' ];
        $this->kbra_conservative_prepayments_applied = $bondData[ 'kbra_conservative_prepayments_applied' ];
        $this->kbra_conservative_losses_applied      = $bondData[ 'kbra_conservative_losses_applied' ];
        $this->kbra_optimistic_projected_balance     = $bondData[ 'kbra_optimistic_projected_balance' ];
        $this->kbra_optimistic_ce                    = $bondData[ 'kbra_optimistic_ce' ];
        $this->kbra_optimistic_defeasance_applied    = $bondData[ 'kbra_optimistic_defeasance_applied' ];
        $this->kbra_optimistic_prepayments_applied   = $bondData[ 'kbra_optimistic_prepayments_applied' ];
        $this->kbra_optimistic_losses_applied        = $bondData[ 'kbra_optimistic_losses_applied' ];
        $this->accumulated_interest_shortfalls       = $bondData[ 'accumulated_interest_shortfalls' ];
    }


}