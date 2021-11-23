<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\BonusForm;
use ForOverReferralsLib\Routes\BonusRoute;
use GuzzleHttp\Exception\GuzzleException;

class BonusController extends BaseController
{
    private static $instance;

    private $bonusRoute;

    /**
     * @param string $authToken
     * @param string $accountSlug
     */
    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
        $this->bonusRoute = new BonusRoute();
    }

    /**
     * @param $authToken
     * @param $accountSlug
     * @return mixed
     */
    public static function getInstance($authToken, $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }



    public function listBonuses($per_page = null, $current_page = null)
    {
        $requestUrl = $this->bonusRoute->bonusListUrl($this->accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function deleteBonus(int $bonusId)
    {
        $requestUrl = $this->bonusRoute->bonusDeleteUrl($this->accountSlug, $bonusId);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateBonus(array $data,int $bonusId)
    {
        $requestUrl = $this->bonusRoute->bonusUpdateUrl($this->accountSlug, $bonusId);

        return $this->request('PATCH', $requestUrl, $data);
    }


    public function postBonus($accountSlug, BonusForm $bonusForm)
    {
        $requestUrl = $this->bonusRoute->bonusCreateUrl($accountSlug);

        return $this->request('POST', $requestUrl, $bonusForm->toArray());
    }

    /**
     * @param int $advocateId
     * @return array
     * @throws GuzzleException
     */
    public function advocateBonuses(int $advocateId)
    {
        $requestUrl = $this->bonusRoute->bonusAdvocateUrl($this->accountSlug, $advocateId);

        return $this->request('GET', $requestUrl);
    }
}

