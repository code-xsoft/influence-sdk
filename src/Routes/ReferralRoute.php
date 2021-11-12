<?php

namespace ForOverReferralsLib\Routes;

class ReferralRoute extends BaseRoute
{
    /**
     * @param string $account_slug
     * @return string
     */
    public function referralCreateUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/referrals');
    }

    /**
     * @param string $account_slug
     * @param int $advocate_id
     * @param array $params
     * @return string
     */
    public function referralListUrl(string $account_slug, int $advocate_id, array $params): string
    {
        $url = $this->getUrl($account_slug, '/referrals/' . $advocate_id);

        return $this->addParams($url, $params);
    }

    /**
     * @param string $account_slug
     * @param int $advocateId
     * @return string
     */
    public function referralUpdateUrl(string $account_slug, int $advocateId): string
    {
        return $this->getUrl($account_slug, '/referrals/' . $advocateId);
    }

    /**
     * @param string $account_slug
     * @param int $advocateId
     * @return string
     */
    public function referralDeleteUrl(string $account_slug, int $advocateId): string
    {
        return $this->getUrl($account_slug, '/referrals/' . $advocateId);
    }

}
