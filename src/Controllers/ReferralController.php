<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\ReferralForm;
use GuzzleHttp\Exception\GuzzleException;
use ForOverReferralsLib\Routes\ReferralRoute;

class ReferralController extends BaseController
{

    private $referralRoute;

    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
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

    public function listReferrals(int $advocate_id, $per_page = null, $current_page = null)
    {
        $requestUrl = $this->referralRoute->referralListUrl($this->accountSlug, $advocate_id, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function deleteReferral($advocateId)
    {
        $requestUrl = $this->referralRoute->referralDeleteUrl($this->accountSlug, $advocateId);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateReferral($data, $referral_id)
    {
        $requestUrl = $this->referralRoute->referralUpdateUrl($this->accountSlug, $referral_id);

        return $this->request('PATCH', $requestUrl, $data);
    }

    public function postReferral($accountSlug, $referrer_advocate_token, ReferralForm $referralForm)
    {

        $requestUrl = $this->referralRoute->referralCreateUrl($accountSlug);

        $data = array_merge([
            'referrer_advocate_token' => $referrer_advocate_token
        ],
            $referralForm->toArray());

//        echo "<pre>";
//        print_r($data);
//        die;

        return $this->request('POST', $requestUrl, $data);
    }
}
