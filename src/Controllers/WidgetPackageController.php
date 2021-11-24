<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\WidgetPackageForm;
use ForOverReferralsLib\Routes\WidgetPackageRoute;
use GuzzleHttp\Exception\GuzzleException;

class WidgetPackageController extends BaseController
{
    private static $instance;
    /**
     * @var WidgetPackageRoute
     */
    private $widgetPackageRoute;


    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
        $this->widgetPackageRoute = new WidgetPackageRoute();
    }

    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    public function getWidgetPackage($accountSlug, $widget_package_id)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageGetUrl($accountSlug, $widget_package_id);

        return $this->request('GET', $requestUrl);
    }

    public function getWidgetPackageBySlug($accountSlug, $widget_package_slug)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageGetBySlugUrl($accountSlug, $widget_package_slug);

        return $this->request('GET', $requestUrl);
    }


    public function getWidgetPackages($accountSlug, $page = 1, $per_page = 100)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageListUrl($accountSlug, [
            'per_page' => $per_page,
            'page' => $page
        ]);

        return $this->request('GET', $requestUrl);
    }


    public function postWidgetPackage($accountSlug, WidgetPackageForm $widgetPackageForm)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageCreateUrl($accountSlug);

        return $this->request('POST', $requestUrl, $widgetPackageForm->toArray());
    }


    public function deleteWidgetPackage(int $widget_packageID)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageDeleteUrl($this->accountSlug, $widget_packageID);

        return $this->request('DELETE', $requestUrl);
    }


    public function updateWidgetPackage(int $widget_packageID, array $data)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageUpdateUrl($this->accountSlug, $widget_packageID);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
