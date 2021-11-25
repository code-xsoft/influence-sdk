<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\ReferralForm;
use GuzzleHttp\Exception\GuzzleException;
use ForOverReferralsLib\Routes\ReferralRoute;

class ReferralController extends BaseController
{

    private $referralRoute;

    public function __construct(string $authToken)
    {
        parent::__construct($authToken);
        $this->referralRoute = new ReferralRoute();
    }

    private static $instance;

    public static function getInstance(string $authToken)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken);
        }

        return static::$instance;
    }

    public function listReferrals($accountSlug, int $advocate_id, $page = 1, $per_page = 100)
    {
        $requestUrl = $this->referralRoute->referralListUrl($accountSlug, $advocate_id, [
            'per_page' => $per_page,
            'page' => $page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function deleteReferral($accountSlug, $advocateId)
    {
        $requestUrl = $this->referralRoute->referralDeleteUrl($accountSlug, $advocateId);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateReferral($accountSlug, $referral_id, $data)
    {
        $requestUrl = $this->referralRoute->referralUpdateUrl($accountSlug, $referral_id);

        return $this->request('PATCH', $requestUrl, $data);
    }

    public function postReferral($accountSlug, $referrer_advocate_token, ReferralForm $referralForm)
    {

        $requestUrl = $this->referralRoute->referralCreateUrl($accountSlug);

        $data = array_merge([
            'referrer_advocate_token' => $referrer_advocate_token
        ],
            $referralForm->toArray());

        return $this->request('POST', $requestUrl, $data);
    }
}
