<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\RedemptionForm;
use ForOverReferralsLib\Routes\RedemptionRoute;
use GuzzleHttp\Exception\GuzzleException;

class RedemptionController extends BaseController
{
    private static $instance;

    /**
     * @var RedemptionRoute
     */
    private $redemptionRoute;

    public function __construct(string $authToken)
    {
        parent::__construct($authToken);
        $this->redemptionRoute = new RedemptionRoute();
    }

    public static function getInstance(string $authToken)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken);
        }

        return static::$instance;
    }

    public function postRedemption($accountSlug, RedemptionForm $redemptionForm)
    {
        $requestUrl = $this->redemptionRoute->redemptionCreateUrl($accountSlug);

        return $this->request('POST', $requestUrl, $redemptionForm->toArray());
    }


    public function getRedemptions($accountSlug, $page = 1, $per_page = 100, $filter = [])
    {
        $params = array_merge([
            'per_page' => $per_page,
            'page' => $page
        ],
            $filter);

        $requestUrl = $this->redemptionRoute->redemptionListUrl($accountSlug, $params);


        return $this->request('GET', $requestUrl);
    }
}
