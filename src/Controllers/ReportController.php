<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\ReportRoute;

class ReportController extends BaseController
{
    private $reportRoute;

    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
        $this->reportRoute = new ReportRoute();
    }

    private static $instance;

    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    public function getClickDailyParticipation($accountSlug, $advocateToken, $from, $to)
    {
        $requestUrl = $this->reportRoute->clickDailyParticipationUrl($accountSlug, $advocateToken, [
            'start' => $from,
            'end' => $to,
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function getShareDailyParticipation($accountSlug, $advocateToken, $from, $to)
    {
        $requestUrl = $this->reportRoute->shareDailyParticipationUrl($accountSlug, $advocateToken, [
            'start' => $from,
            'end' => $to,
        ]);

        return $this->request('GET', $requestUrl);
    }
}