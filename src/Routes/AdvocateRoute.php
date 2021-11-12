<?php

namespace ForOverReferralsLib\Routes;

class AdvocateRoute extends BaseRoute
{
    /**
     * @param string $account_slug
     * @return string
     */
    public function advocateCreateUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/advocates');
    }

    /**
     * @param string $account_slug
     * @param array $params
     * @return string
     */
    public function advocateListUrl(string $account_slug, array $params): string
    {
        $url = $this->getUrl($account_slug, '/advocates');

        return $this->addParams($url, $params);
    }

    /**
     * @param string $account_slug
     * @param string $advocateToken
     * @return string
     */
    public function advocateUpdateUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }

    /**
     * @param string $account_slug
     * @param string $advocateToken
     * @return string
     */
    public function advocateDeleteUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }

    /**
     * @param string $account_slug
     * @param string $advocateToken
     * @return string
     */
    public function advocateFindUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }
}
