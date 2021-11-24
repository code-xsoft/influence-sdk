<?php

namespace ForOverReferralsLib\Routes;

class WidgetPackageRoute extends BonusRoute
{

    public function widgetPackageFindUrl(string $account_slug, int $widget_package_id): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_package_id);
    }

    public function widgetPackageListUrl(string $account_slug, array $params = []): string
    {
        $url = $this->getUrl($account_slug, '/widget-packages');

        return $this->addParams($url, $params);
    }

    public function widgetPackageGetUrl(string $account_slug, int $widget_package_id): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_package_id);
    }

    public function widgetPackageGetBySlugUrl(string $account_slug, string $widget_package_slug): string
    {
        return $this->getUrl($account_slug, '/widget-packages/slug/'. $widget_package_slug);
    }

    public function widgetPackageDeleteUrl(string $account_slug, int $widget_package_id): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_package_id);
    }

    public function widgetPackageUpdateUrl(string $account_slug, int $widget_package_id): string
    {
        return $this->getUrl($account_slug, '/widget-packages/'. $widget_package_id );
    }

    public function widgetPackageCreateUrl(string $account_slug): string
    {
        return $this->getUrl($account_slug, '/widget-packages');
    }
}
