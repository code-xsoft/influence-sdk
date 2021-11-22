<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\RedemptionRoute;
use GuzzleHttp\Exception\GuzzleException;

class RedemptionController extends BaseController
{
    private static $instance;

    /**
     * @var RedemptionRoute
     */
    private $redemptionRoute;

    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
        $this->redemptionRoute = new RedemptionRoute();
    }

    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    public function createRedemption(array $data)
    {
        $requestUrl = $this->redemptionRoute->redemptionCreateUrl($this->accountSlug);

        return $this->request('POST', $requestUrl, $data);
    }


    public function getRedemptions($advocate_id, $per_page = null, $current_page = null)
    {
        $requestUrl = $this->redemptionRoute->redemptionListUrl($this->accountSlug, $advocate_id, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }
}
