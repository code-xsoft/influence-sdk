<?php
/**
 * Widgets
 *
 * @author Gevorg
 * @author X-Soft
 */

namespace ForOverReferralsLib\Models;

/**
 * A bonus structure
 */
class WidgetPackage
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
     * Landing URL.
     * @maps landing_url
     * @var string $landing_url public property
     */
    public $landing_url;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name Initialization value for $this->name
     * @param string $description Initialization value for $this->description
     * @param string $landing_url Initialization value for $this->landing_url
     */

    public function __construct(string $name, string $description, string $landing_url)
    {
        $this->name = $name;
        $this->description = $description;
        $this->landing_url = $landing_url;
    }


    /**
     * Encode this object to JSON
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'landing_url' => $this->landing_url,
        ];
    }
}
