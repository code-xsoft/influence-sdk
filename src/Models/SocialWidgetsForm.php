<?php

/**
 * Widgets Form
 *
 * @author Gevorg
 * @author X-Soft
 */

namespace GeniusReferralsLib\Models;

use JsonSerializable;

/**
 * The Widgets' form
 */
class SocialWidgetsForm implements JsonSerializable
{
    /**
     * The bonuses' wrapper
     * @required
     * @var SocialWidgets $widget public property
     */
    public $widget;

    /**
     * Constructor to set initial or default values of member properties
     * @param SocialWidgets $widget Initialization value for $this->widget
     */
    public function __construct($widget)
    {
        $this->widget = $widget;
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['widget'] = $this->widget;

        return $json;
    }
}
