<?php

namespace ForOverReferralsLib;

use ForOverReferralsLib\Controllers\BonusController;
use ForOverReferralsLib\Controllers\WidgetsController;
use ForOverReferralsLib\Controllers\ReferralsController;
use ForOverReferralsLib\Controllers\AdvocatesController;
use ForOverReferralsLib\Controllers\RedemptionController;
use ForOverReferralsLib\Controllers\WidgetPackageController;


class InfluenceClient
{
    private $authToken;

    private $accountSlug;

    public function __construct($accountSlug, $AuthToken)
    {
        $this->authToken = $AuthToken;
        $this->accountSlug = $accountSlug;
    }

    /**
     * @return AdvocatesController The *Singleton* instance
     */
    public function getAdvocates(): AdvocatesController
    {
        return AdvocatesController::getInstance($this->authToken, $this->accountSlug);
    }

    /**
     * @return ReferralsController The *Singleton* instance
     */
    public function getReferrals(): ReferralsController
    {
        return ReferralsController::getInstance($this->authToken, $this->accountSlug);
    }

    /**
     * @return BonusController The *Singleton* instance
     */
    public function getBonuses(): BonusController
    {
        return BonusController::getInstance($this->authToken, $this->accountSlug);
    }

    /**
     * @return RedemptionController The *Singleton* instance
     */
    public function getRedemption(): RedemptionController
    {
        return RedemptionController::getInstance($this->authToken, $this->accountSlug);
    }


    /**
     * @return WidgetsController The *Singleton* instance
     */
    public function getWidgets(): WidgetsController
    {
        return WidgetsController::getInstance($this->authToken, $this->accountSlug);
    }


    /**
     * @return WidgetPackageController The *Singleton* instance
     */
    public function getWidgetPackages(): WidgetPackageController
    {
        return WidgetPackageController::getInstance($this->authToken, $this->accountSlug);
    }
}
