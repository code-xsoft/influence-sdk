<?php
/*
 * GeniusReferralsLib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace ForOverReferralsLib\Models;

/**
 * The referral structure
 */
class Referral
{
    /**
     * The referrals token
     * @required
     * @maps referred_advocate_token
     * @var string $advocate_token public property
     */
    public $referral_advocate_token;

    /**
     * The referral origin identifier
     * @required
     * @maps referral_origin_slug
     * @var string $referral_origin_slug public property
     */
    public $referral_origin_slug;

    /**
     * The http_referrer URL
     * @required
     * @maps http_referer
     * @var string $url public property
     */
    public $url;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $referral_advocate_token Initialization value for $this->referredAdvocateToken
     * @param string $referral_origin_slug Initialization value for $this->referralOriginSlug
     * @param string $url Initialization value for $this->httpReferer
     */
    public function __construct(
        string $referral_advocate_token,
        string $referral_origin_slug,
        string $url)
    {
        $this->referral_advocate_token = $referral_advocate_token;
        $this->referral_origin_slug = $referral_origin_slug;
        $this->url = $url;
    }

    public function toArray(): array
    {
        return [
            'referral_advocate_token' => $this->referral_advocate_token,
            'referral_origin_slug' => $this->referral_origin_slug,
            'url' => $this->url,
        ];
    }

}
