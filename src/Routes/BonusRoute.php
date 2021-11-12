<?php

namespace ForOverReferralsLib\Routes;

class BonusRoute extends BaseRoute
{
    /**
     * @param string $account_slug
     * @return string
     */
    public function bonusCreateUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/bonuses');
    }

    /**
     * @param string $account_slug
     * @param array $params
     * @return string
     */
    public function bonusListUrl(string $account_slug, array $params): string
    {
        $url = $this->getUrl($account_slug, '/bonuses');

        return $this->addParams($url, $params);
    }

    /**
     * @param string $account_slug
     * @param int $bonus_id
     * @return string
     */
    public function bonusUpdateUrl(string $account_slug, int $bonus_id): string
    {
        return $this->getUrl($account_slug, '/bonuses/' . $bonus_id);
    }

    /**
     * @param string $account_slug
     * @param int $bonus_id
     * @return string
     */
    public function bonusDeleteUrl(string $account_slug, int $bonus_id): string
    {
        return $this->getUrl($account_slug, '/bonuses/' . $bonus_id);
    }


    /**
     * @param string $account_slug
     * @param int $advocate_id
     * @return string
     */
    public function bonusAdvocateUrl(string $account_slug, int $advocate_id): string
    {
        return $this->getUrl($account_slug, '/bonuses/'.$advocate_id);
    }
}
