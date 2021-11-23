<?php

namespace ForOverReferralsLib\Routes;

class WidgetPackageRoute extends BonusRoute
{
    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @return string
     */
    public function widgetPackageFindUrl(string $account_slug, int $widget_packageID): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_packageID);
    }

    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @return string
     */
    public function widgetPackageDeleteUrl(string $account_slug, int $widget_packageID): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_packageID);
    }

    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @return string
     */
    public function widgetPackageUpdateUrl(string $account_slug, int $widget_packageID): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_packageID );
    }

    /**
     * @param string $account_slug
     * @param int $advocate_id
     * @return string
     */
    public function widgetPackageCreateUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/widget-packages');
    }

    /**
     * @param string $account_slug
     * @param array $params
     * @return string
     */
    public function widgetPackageListUrl(string $account_slug, array $params): string
    {
        $url = $this->getUrl($account_slug, '/widget-packages');

        return $this->addParams($url, $params);
    }
}
