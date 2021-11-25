<?php

namespace ForOverReferralsLib;

use ForOverReferralsLib\Controllers\BonusController;
use ForOverReferralsLib\Controllers\ReportController;
use ForOverReferralsLib\Controllers\WidgetController;
use ForOverReferralsLib\Controllers\ReferralController;
use ForOverReferralsLib\Controllers\AdvocateController;
use ForOverReferralsLib\Controllers\RedemptionController;
use ForOverReferralsLib\Controllers\WidgetPackageController;

class InfluenceClient
{
    private $authToken;

    public function __construct($AuthToken)
    {
        $this->authToken = $AuthToken;
    }

    /**
     * @return AdvocateController The *Singleton* instance
     */
    public function getAdvocates(): AdvocateController
    {
        return AdvocateController::getInstance($this->authToken);
    }

    /**
     * @return ReferralController The *Singleton* instance
     */
    public function getReferrals(): ReferralController
    {
        return ReferralController::getInstance($this->authToken);
    }

    /**
     * @return BonusController The *Singleton* instance
     */
    public function getBonuses(): BonusController
    {
        return BonusController::getInstance($this->authToken);
    }

    /**
     * @return RedemptionController The *Singleton* instance
     */
    public function getRedemptions(): RedemptionController
    {
        return RedemptionController::getInstance($this->authToken);
    }


    /**
     * @return WidgetController The *Singleton* instance
     */
    public function getWidgets(): WidgetController
    {
        return WidgetController::getInstance($this->authToken);
    }


    /**
     * @return WidgetPackageController The *Singleton* instance
     */
    public function getWidgetPackages(): WidgetPackageController
    {
        return WidgetPackageController::getInstance($this->authToken);
    }

    /**
     * @return ReportController The *Singleton* instance
     */
    public function getReports(): ReportController
    {
        return ReportController::getInstance($this->authToken);
    }
}
