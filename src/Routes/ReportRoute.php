<?php

namespace ForOverReferralsLib\Routes;

class ReportRoute extends BaseRoute
{
    public function clickDailyParticipationUrl(string $account_slug, string $advocateToken, array $params): string
    {
        $url = $this->getUrl($account_slug, '/reports/click/daily/' . $advocateToken);

        return $this->addParams($url, $params);
    }

    public function shareDailyParticipationUrl(string $account_slug, string $advocateToken, array $params): string
    {
        $url = $this->getUrl($account_slug, '/reports/click/daily/' . $advocateToken);

        return $this->addParams($url, $params);
    }
}