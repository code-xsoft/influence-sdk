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

    public function redemptionListUrl(string $account_slug, array $params = []): string
    {
        $url = $this->getUrl($account_slug, '/redemptions/');


        return $this->addParams($url, $params);
    }
}
