<?php

namespace ForOverReferralsLib\Controllers;

use ForOverReferralsLib\Models\WidgetForm;
use ForOverReferralsLib\Routes\WidgetRoute;
use GuzzleHttp\Exception\GuzzleException;

class WidgetController extends BaseController
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

    public function postWidget($accountSlug, $widget_package_id, WidgetForm $widgetForm)
    {
        $requestUrl = $this->widgetRoute->widgetCreateUrl($accountSlug, $widget_package_id);

        return $this->request('POST', $requestUrl, $widgetForm->toArray());
    }

    public function deleteWidget($widget_packageID, $widget_id)
    {
        $requestUrl = $this->widgetRoute->widgetDeleteUrl($this->accountSlug, $widget_packageID, $widget_id);

        return $this->request('DELETE', $requestUrl);
    }

    public function listWidget($widget_packageID, $per_page = null, $current_page = null)
    {
        $requestUrl = $this->widgetRoute->widgetListUrl($this->accountSlug, $widget_packageID, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function updateWidget($widget_packageID, $widget_id, $data)
    {
        $requestUrl = $this->widgetRoute->widgetUpdateUrl($this->accountSlug, $widget_packageID, $widget_id);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
