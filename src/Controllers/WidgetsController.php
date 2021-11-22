<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Routes\WidgetRoute;
use GuzzleHttp\Exception\GuzzleException;

class WidgetsController extends BaseController
{
    private static $instance;

    /**
     * @var WidgetRoute
     */
    private $widgetRoute;

    /**
     * @param string $authToken
     * @param string $accountSlug
     */
    public function __construct(string $authToken, string $accountSlug)
    {
        parent::__construct($authToken, $accountSlug);
        $this->widgetRoute = new WidgetRoute();
    }

    /**
     * @param string $authToken
     * @param string $accountSlug
     * @return mixed
     */
    public static function getInstance(string $authToken, string $accountSlug)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken, $accountSlug);
        }

        return static::$instance;
    }

    /**
     * @param $widget_packageID
     * @param $data
     * @return array
     * @throws GuzzleException
     */
    public function createWidget($widget_packageID, $data): array
    {
        $requestUrl = $this->widgetRoute->widgetCreateUrl($this->accountSlug, $widget_packageID);

        return $this->request('POST', $requestUrl, $data);
    }

    /**
     * @param $widget_packageID
     * @param $widget_id
     * @return array
     * @throws GuzzleException
     */
    public function deleteWidget($widget_packageID, $widget_id): array
    {
        $requestUrl = $this->widgetRoute->widgetDeleteUrl($this->accountSlug, $widget_packageID, $widget_id);

        return $this->request('DELETE', $requestUrl);
    }

    /**
     * @param $widget_packageID
     * @param null $per_page
     * @param null $current_page
     * @return array
     * @throws GuzzleException
     */
    public function listWidget($widget_packageID, $per_page = null, $current_page = null): array
    {
        $requestUrl = $this->widgetRoute->widgetListUrl($this->accountSlug, $widget_packageID, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    /**
     * @param $widget_packageID
     * @param $widget_id
     * @param $data
     * @return array
     * @throws GuzzleException
     */
    public function updateWidget($widget_packageID, $widget_id, $data): array
    {
        $requestUrl = $this->widgetRoute->widgetUpdateUrl($this->accountSlug, $widget_packageID, $widget_id);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
