<?php

namespace ForOverReferralsLib\Routes;

class WidgetRoute extends BonusRoute
{
    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @return string
     */
    public function widgetCreateUrl(string $account_slug, int $widget_packageID): string
    {
        return $this->getUrl($account_slug, '/widget_packages/'. $widget_packageID . '/widgets');
    }

    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @param array $params
     * @return string
     */
    public function widgetListUrl(string $account_slug, int $widget_packageID, array $params): string
    {
        $url = $this->getUrl($account_slug, '/widget_packages/'. $widget_packageID . '/widgets');

        return $this->addParams($url, $params);
    }

    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @param $widget_id
     * @return string
     */

    public function widgetUpdateUrl(string $account_slug, int $widget_packageID, $widget_id): string
    {
        return $this->getUrl($account_slug, '/widget_packages/'. $widget_packageID . '/widgets/'. $widget_id);
    }

    /**
     * @param string $account_slug
     * @param int $widget_packageID
     * @param $widget_id
     * @return string
     */
    public function widgetDeleteUrl(string $account_slug, int $widget_packageID, $widget_id): string
    {
        return $this->getUrl($account_slug, '/widget_packages/'. $widget_packageID . '/widgets/' . $widget_id);
    }
}
