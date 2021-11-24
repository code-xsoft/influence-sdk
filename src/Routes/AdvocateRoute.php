<?php

namespace ForOverReferralsLib\Routes;

class AdvocateRoute extends BaseRoute
{

    public function advocatePostUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/advocates');
    }

    public function advocateListUrl(string $account_slug, array $params): string
    {
        $url = $this->getUrl($account_slug, '/advocates');

        return $this->addParams($url, $params);
    }

    public function advocateUpdateUrl(string $account_slug, $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }


    public function advocateDeleteUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }


    public function advocateFindUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken);
    }

    public function advocateGetShareLinksUrl(string $account_slug, string $advocateToken): string
    {
        return $this->getUrl($account_slug, '/advocates/' . $advocateToken . '/share-links');
    }
}
