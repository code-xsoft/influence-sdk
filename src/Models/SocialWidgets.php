<?php
/**
 * Widgets
 *
 * @author Gevorg
 * @author X-Soft
 */

namespace GeniusReferralsLib\Models;

use JsonSerializable;

/**
 * A bonus structure
 */
class SocialWidgets implements JsonSerializable
{
    /**
     * Referral Origin Slug // facebok-share, personal
     * @required
     * @maps name
     * @var string $referral_origin_slug public property
     */
    public $referral_origin_slug;

    /**
     * Array Of Images
     * @var array $images public property
     */
    public $images;

    /**
     * Title
     * @maps campaign_slug
     * @var string $title public property
     */
    public $title;

    /**
     * Summary.
     * @maps landing_url
     * @var string $summary public property
     */
    public $summary;

    /**
     * Site Name
     * @maps locale
     * @var string $site_name public property
     */
    public $site_name;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name Initialization value for $this->name
     * @param string $description Initialization value for $this->description
     * @param string $campaign_slug Initialization value for $this->campaign_slug
     * @param string $landing_url Initialization value for $this->landing_url
     */

    public function __construct($referral_origin_slug, $images, $title, $summary, $site_name)
    {
        $this->referral_origin_slug = $referral_origin_slug;
        $this->images = $images;
        $this->title = $title;
        $this->summary = $summary;
        $this->site_name = $site_name;
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['referral_origin_slug'] = $this->referral_origin_slug;
        $json['images'] = $this->images;
        $json['title'] = $this->title;
        $json['summary'] = $this->summary;
        $json['site_name'] = $this->site_name;

        return $json;
    }
}
