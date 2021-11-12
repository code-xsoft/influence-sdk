<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\AdvocateRoute;
use GuzzleHttp\Exception\GuzzleException;

class AdvocatesController extends BaseController
{
    private static $instance;

    /**
     * @var string
     */
    private $accountSlug;

    /**
     * @var AdvocateRoute
     */
    private $advocateRoute;
    /**
     * @var string[]
     */
    public $headers;

    /**
     * @param string $authToken
     * @param string $accountSlug
     */
    public function __construct(string $authToken, string $accountSlug)
    {
        $this->headers = [
            'app-key' => $authToken,
            'Accept' => 'application/json'
        ];

        $this->accountSlug = $accountSlug;

        $this->advocateRoute = new AdvocateRoute();
    }


    /**
     * @param string $authToken
     * @param string $accountSlug
     * @return mixed
     */
    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {

            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    /**
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */
    public function listAdvocates($per_page = null, $current_page = null): array
    {
        $requestUrl = $this->advocateRoute->advocateListUrl($this->accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function findAdvocate(string $advocateToken): array
    {
        $requestUrl = $this->advocateRoute->advocateFindUrl($this->accountSlug, $advocateToken);

        return $this->request('GET', $requestUrl);
    }

    /**
     * @param $advocateToken
     * @return array
     * @throws GuzzleException
     */
    public function deleteAdvocate($advocateToken): array
    {
        $requestUrl = $this->advocateRoute->advocateDeleteUrl($this->accountSlug, $advocateToken);

        return $this->request('DELETE', $requestUrl);
    }

    /**
     * @param $data
     * @param $advocateToken
     * @return array
     * @throws GuzzleException
     */
    public function updateAdvocate($data, $advocateToken): array
    {
        $requestUrl = $this->advocateRoute->advocateUpdateUrl($this->accountSlug, $advocateToken);

        return $this->request('PATCH', $requestUrl, $data);
    }

    /**
     * @param $data
     * @return array
     * @throws GuzzleException
     */

    public function createAdvocate($data): array
    {
        $requestUrl = $this->advocateRoute->advocateCreateUrl($this->accountSlug);

        return $this->request('POST', $requestUrl, $data);
    }
}
