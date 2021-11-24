<?php

/**
 * Widgets Form
 *
 * @author Gevorg
 * @author X-Soft
 */

namespace ForOverReferralsLib\Models;


/**
 * The Widgets' form
 */
class WidgetPackageForm
{
    /**
     * The bonuses' wrapper
     * @required
     * @var WidgetPackage $widget_package public property
     */
    public $widget_package;

    /**
     * Constructor to set initial or default values of member properties
     * @param WidgetPackage $widget_package Initialization value for $this->widget
     */
    public function __construct(WidgetPackage $widget_package)
    {
        $this->widget_package = $widget_package;
    }


    /**
     * Encode this object to JSON
     */
    public function toArray(): array
    {
        return $this->widget_package->toArray();
    }
}
