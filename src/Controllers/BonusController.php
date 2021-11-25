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
     */
    public function __construct(string $authToken)
    {
        parent::__construct($authToken);
        $this->bonusRoute = new BonusRoute();
    }

    /**
     * @param $authToken
     * @param $accountSlug
     * @return mixed
     */
    public static function getInstance($authToken)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken);
        }

        return static::$instance;
    }

    public function listBonuses($accountSlug, $page = 1, $per_page = 100)
    {
        $requestUrl = $this->bonusRoute->bonusListUrl($accountSlug, [
            'per_page' => $per_page,
            'page' => $page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function deleteBonus($accountSlug, int $bonusId)
    {
        $requestUrl = $this->bonusRoute->bonusDeleteUrl($accountSlug, $bonusId);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateBonus($accountSlug, int $bonusId, array $data)
    {
        $requestUrl = $this->bonusRoute->bonusUpdateUrl($accountSlug, $bonusId);

        return $this->request('PATCH', $requestUrl, $data);
    }


    public function postBonus($accountSlug, BonusForm $bonusForm)
    {
        $requestUrl = $this->bonusRoute->bonusCreateUrl($accountSlug);

        return $this->request('POST', $requestUrl, $bonusForm->toArray());
    }

    public function advocateBonuses($accountSlug, int $advocateId)
    {
        $requestUrl = $this->bonusRoute->bonusAdvocateUrl($accountSlug, $advocateId);

        return $this->request('GET', $requestUrl);
    }
}

