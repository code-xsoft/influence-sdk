<?php

namespace ForOverReferralsLib\Routes;

use ForOverReferralsLib\Configuration;

class BaseRoute
{
    /**
     * @param string $account_slug
     * @param string $urn
     * @return string
     */
    protected function getUrl(string $account_slug, string $urn): string
    {
        return Configuration::$baseUri . $account_slug . $urn;
    }

    /**
     * @param string $url
     * @param array $params
     * @return string
     */
    protected function addParams(string $url, array $params): string
    {
        $concatenateKey = '?';
        foreach ($params as $key => $param) {
            if (!empty($param)) {
                $url = $url . $concatenateKey . $key . '=' . $param;

                $concatenateKey = '&';
            }
        }

        return $url;
    }
}
