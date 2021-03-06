<?php
/*
 * GeniusReferralsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ForOverReferralsLib\Models;

/**
 * A bonus structure
 */
class Bonus
{
    /**
     * The referral's token.
     * @required
     * @maps advocate_token
     * @var string $advocate_token public property
     */
    public $advocate_token;

    /**
     * The reference number for this request. Usually the order_id, payment_id, or timestamp.
     * @required
     * @var string $reference public property
     */
    public $reference;

    /**
     * The bonus amount to give to the advocate.
     * @required
     * @maps amount
     * @var integer $amount public property
     */
    public $amount;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $advocate_token Initialization value for $this->advocateToken
     * @param string $reference Initialization value for $this->reference
     * @param integer $amount Initialization value for $this->bonusAmount
     */
    public function __construct(string $advocate_token, string $reference, int $amount)
    {
        $this->advocate_token = $advocate_token;
        $this->reference = $reference;
        $this->amount = $amount;
    }


    public function toArray(): array
    {
        return [
            'advocate_token' => $this->advocate_token,
            'reference' => $this->reference,
            'amount' => $this->amount,
        ];
    }
}
