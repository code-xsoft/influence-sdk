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
class Widgets implements JsonSerializable
{
    /**
     * Widget name
     * @required
     * @maps name
     * @var string $name public property
     */
    public $name;

    /**
     * Widget description
     * @var string $description public property
     */
    public $description;

    /**
     * Campaign slug.
     * @maps campaign_slug
     * @var string $campaign_slug public property
     */
    public $campaign_slug;

    /**
     * Landing URL.
     * @maps landing_url
     * @var string $landing_url public property
     */
    public $landing_url;

    /**
     * Locale
     * @maps locale
     * @var string $locale public property
     */
    public $locale;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name Initialization value for $this->name
     * @param string $description Initialization value for $this->description
     * @param string $campaign_slug Initialization value for $this->campaign_slug
     * @param string $landing_url Initialization value for $this->landing_url
     */

    public function __construct($name, $description, $campaign_slug, $landing_url)
    {
        $this->name = $name;
        $this->description = $description;
        $this->campaign_slug = $campaign_slug;
        $this->landing_url = $landing_url;
        $this->locale = 'en_US';
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name'] = $this->name;
        $json['description'] = $this->description;
        $json['campaign_slug'] = $this->campaign_slug;
        $json['landing_url'] = $this->landing_url;
        $json['locale'] = 'en_US';

        return $json;
    }
}
