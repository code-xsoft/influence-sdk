<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\AdvocateRoute;
use GuzzleHttp\Exception\GuzzleException;
use ForOverReferralsLib\Models\AdvocateForm;

class AdvocateController extends BaseController
{
    private static $instance;


    /**
     * @var AdvocateRoute
     */
    private $advocateRoute;

    /**
     * @param string $authToken
     */
    public function __construct(string $authToken)
    {
        parent::__construct($authToken);

        $this->advocateRoute = new AdvocateRoute();
    }


    /**
     * @param string $authToken
     * @return mixed
     */
    public static function getInstance(string $authToken)
    {
        if (null === static::$instance) {

            static::$instance = new static($authToken);
        }

        return static::$instance;
    }


    public function listAdvocates($accountSlug, $per_page = null, $current_page = null)
    {
        $requestUrl = $this->advocateRoute->advocateListUrl($accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function getAdvocate($accountSlug, string $advocateToken)
    {
        $requestUrl = $this->advocateRoute->advocateFindUrl($accountSlug, $advocateToken);

        return $this->request('GET', $requestUrl);
    }


    public function deleteAdvocate($accountSlug, $advocateToken)
    {
        $requestUrl = $this->advocateRoute->advocateDeleteUrl($accountSlug, $advocateToken);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateAdvocate($accountSlug, $advocateToken, $data)
    {
        $requestUrl = $this->advocateRoute->advocateUpdateUrl($accountSlug, $advocateToken);

        return $this->request('PATCH', $requestUrl, $data);
    }


    public function postAdvocate($accountSlug, AdvocateForm $advocateForm)
    {
        $requestUrl = $this->advocateRoute->advocatePostUrl($accountSlug);

        return $this->request('POST', $requestUrl, $advocateForm->toArray());
    }


    public function getShareLinks($accountSlug, $advocate_token)
    {
        $requestUrl = $this->advocateRoute->advocateGetShareLinksUrl($accountSlug, $advocate_token);

        return $this->request('GET', $requestUrl, $advocate_token);
    }


}
