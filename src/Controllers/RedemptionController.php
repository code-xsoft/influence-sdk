<?php

namespace ForOverReferralsLib\Controllers;


use ForOverReferralsLib\Routes\RedemptionRoute;
use GuzzleHttp\Exception\GuzzleException;

class RedemptionController extends BaseController
{
    private static $instance;
    /**
     * @var string[]
     */
    public $headers;
    /**
     * @var string
     */
    private $accountSlug;
    /**
     * @var RedemptionRoute
     */
    private $redemptionRoute;

    public function __construct(string $authToken, string $accountSlug)
    {
        $this->headers = [
            'app-key' => $authToken,
            'Accept' => 'application/json'
        ];

        $this->accountSlug = $accountSlug;

        $this->redemptionRoute = new RedemptionRoute();
    }

    public static function getInstance(string $authToken,string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    /**
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function createRedemption(array $data): array
    {
        $requestUrl = $this->redemptionRoute->redemptionCreateUrl($this->accountSlug);

        return $this->request('POST', $requestUrl, $data);
    }

    /**
     * @param $advocate_id
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */

    public function redemptionList($advocate_id, $per_page = null, $current_page = null): array
    {
        $requestUrl = $this->redemptionRoute->redemptionListUrl($this->accountSlug, $advocate_id, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }
}
