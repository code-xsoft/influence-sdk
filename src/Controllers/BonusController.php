<?php

namespace ForOverReferralsLib\Controllers;

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

    /**
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */

    public function listBonuses($per_page = null, $current_page = null): array
    {
        $requestUrl = $this->bonusRoute->bonusListUrl($this->accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    /**
     * @param int $bonusId
     * @return array
     * @throws GuzzleException
     */
    public function deleteBonus(int $bonusId): array
    {
        $requestUrl = $this->bonusRoute->bonusDeleteUrl($this->accountSlug, $bonusId);

        return $this->request('DELETE', $requestUrl);
    }

    /**
     * @param array $data
     * @param int $bonusId
     * @return array
     * @throws GuzzleException
     */
    public function updateBonus(array $data,int $bonusId): array
    {
        $requestUrl = $this->bonusRoute->bonusUpdateUrl($this->accountSlug, $bonusId);

        return $this->request('PATCH', $requestUrl, $data);
    }

    /**
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function createBonus(array $data): array
    {
        $requestUrl = $this->bonusRoute->bonusCreateUrl($this->accountSlug);

        return $this->request('POST', $requestUrl, $data);
    }

    /**
     * @param int $advocateId
     * @return array
     * @throws GuzzleException
     */
    public function advocateBonuses(int $advocateId): array
    {
        $requestUrl = $this->bonusRoute->bonusAdvocateUrl($this->accountSlug, $advocateId);

        return $this->request('GET', $requestUrl);
    }
}

