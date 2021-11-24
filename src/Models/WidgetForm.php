<?php

/**
 * Widgets Form
 *
 * @author Gevorg
 * @author X-Soft
 */

namespace ForOverReferralsLib\Models;

class WidgetForm
{
    /**
     * The bonuses' wrapper
     * @required
     * @var Widget $widget public property
     */
    public $widget;

    /**
     * Constructor to set initial or default values of member properties
     * @param Widget $widget Initialization value for $this->widget
     */
    public function __construct(Widget $widget)
    {
        $this->widget = $widget;
    }


    /**
     * Encode this object to JSON
     */
    public function toArray(): array
    {
        return $this->widget->toArray();
    }
}
