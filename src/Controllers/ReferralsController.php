<?php

namespace ForOverReferralsLib\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use ForOverReferralsLib\Routes\ReferralRoute;

class ReferralsController extends BaseController
{
    /**
     * @var string[]
     */
    public $headers;
    /**
     * @var string
     */
    private $accountSlug;
    /**
     * @var ReferralRoute
     */
    private $referralRoute;

    public function __construct(string $authToken, string $accountSlug)
    {
        $this->headers = [
            'app-key' => $authToken,
            'Accept' => 'application/json'
        ];

        $this->accountSlug = $accountSlug;

        $this->referralRoute = new ReferralRoute();
    }

    private static $instance;

    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    /**
     * @param int $advocate_id
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */
    public function listReferrals(int $advocate_id, $per_page = null, $current_page = null): array
    {
        $requestUrl = $this->referralRoute->referralListUrl($this->accountSlug, $advocate_id, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    /**
     * @param $advocateId
     * @return array
     * @throws GuzzleException
     */
    public function deleteReferral($advocateId): array
    {
        $requestUrl = $this->referralRoute->referralDeleteUrl($this->accountSlug, $advocateId);

        return $this->request('DELETE', $requestUrl);
    }

    /**
     * @param $data
     * @param $referral_id
     * @return array
     * @throws GuzzleException
     */
    public function updateReferral($data, $referral_id): array
    {
        $requestUrl = $this->referralRoute->referralUpdateUrl($this->accountSlug, $referral_id);

        return $this->request('PATCH', $requestUrl, $data);
    }

    /**
     * @param $data
     * @return array
     * @throws GuzzleException
     */

    public function createReferral($data): array
    {
        $requestUrl = $this->referralRoute->referralCreateUrl($this->accountSlug);

        return $this->request('POST', $requestUrl, $data);
    }
}
