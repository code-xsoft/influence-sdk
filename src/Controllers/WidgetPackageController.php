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


    public function listWidgetPackage($per_page = null, $current_page = null)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageListUrl($this->accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function updateWidgetPackage(int $widget_packageID, array $data)
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageUpdateUrl($this->accountSlug, $widget_packageID);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
