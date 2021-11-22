<?php

namespace ForOverReferralsLib\Models;

/**
 * The advocate's form
 */
class AdvocateForm
{
    /**
     * The advocate's wrapper
     * @required
     * @var Advocate $advocate public property
     */
    public $advocate;

    /**
     * Constructor to set initial or default values of member properties
     * @param Advocate $advocate Initialization value for $this->advocate
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->advocate = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function toArray()
    {
        return $this->advocate;
    }
}
