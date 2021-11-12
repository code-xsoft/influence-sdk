<?php

namespace ForOverReferralsLib\Routes;

class RedemptionRoute extends BaseRoute
{
    /**
     * @param string $account_slug
     * @return string
     */
    public function redemptionCreateUrl(string $account_slug ): string
    {
        return $this->getUrl($account_slug, '/redemptions');
    }

    /**
     * @param string $account_slug
     * @param int $advocate_id
     * @param array $params
     * @return string
     */
    public function redemptionListUrl(string $account_slug, int $advocate_id, array $params): string
    {
        $url = $this->getUrl($account_slug, '/redemptions/' . $advocate_id);

        return $this->addParams($url, $params);
    }
}
