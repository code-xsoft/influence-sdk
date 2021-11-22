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
class WidgetsForm implements JsonSerializable
{
    /**
     * The bonuses' wrapper
     * @required
     * @var Widgets $widgets_package public property
     */
    public $widgets_package;

    /**
     * Constructor to set initial or default values of member properties
     * @param Widgets $widgets_package Initialization value for $this->widget
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->widgets_package = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['widgets_package'] = $this->widgets_package;

        return $json;
    }
}
