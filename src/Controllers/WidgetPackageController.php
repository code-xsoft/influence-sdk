<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\WidgetPackageRoute;
use GuzzleHttp\Exception\GuzzleException;

class WidgetPackageController extends BaseController
{
    private static $instance;
    /**
     * @var WidgetPackageRoute
     */
    private $widgetPackageRoute;
    /**
     * @var string
     */
    private $accountSlug;
    /**
     * @var string[]
     */
    public $headers;

    public function __construct(string $authToken, string $accountSlug)
    {
        $this->headers = [
            'app-key' => $authToken,
            'Accept' => 'application/json'
        ];

        $this->accountSlug = $accountSlug;

        $this->widgetPackageRoute = new WidgetPackageRoute();
    }

    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    /**
     * @param array $data
     * @param int $advocate_id
     * @return array
     * @throws GuzzleException
     */
    public function createWidgetPackage(array $data, int $advocate_id): array
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageCreateUrl($this->accountSlug, $advocate_id);

        return $this->request('POST', $requestUrl, $data);
    }

    /**
     * @param int $widget_packageID
     * @return array
     * @throws GuzzleException
     */
    public function deleteWidgetPackage(int $widget_packageID): array
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageDeleteUrl($this->accountSlug, $widget_packageID);

        return $this->request('DELETE', $requestUrl);
    }

    /**
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */
    public function listWidgetPackage($per_page = null, $current_page = null): array
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageListUrl($this->accountSlug, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    /**
     * @param int $widget_packageID
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    public function updateWidgetPackage(int $widget_packageID, array $data): array
    {
        $requestUrl = $this->widgetPackageRoute->widgetPackageUpdateUrl($this->accountSlug, $widget_packageID);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
