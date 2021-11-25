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
     */
    public function __construct(string $authToken)
    {
        parent::__construct($authToken);
        $this->widgetRoute = new WidgetRoute();
    }

    /**
     * @param string $authToken
     * @return mixed
     */
    public static function getInstance(string $authToken)
    {
        if (null === static::$instance) {
            static::$instance = new static($authToken);
        }

        return static::$instance;
    }

    public function postWidget($accountSlug, $widget_package_id, WidgetForm $widgetForm)
    {
        $requestUrl = $this->widgetRoute->widgetCreateUrl($accountSlug, $widget_package_id);

        return $this->request('POST', $requestUrl, $widgetForm->toArray());
    }

    public function deleteWidget($accountSlug, $widget_packageID, $widget_id)
    {
        $requestUrl = $this->widgetRoute->widgetDeleteUrl($accountSlug, $widget_packageID, $widget_id);

        return $this->request('DELETE', $requestUrl);
    }

    public function listWidget($accountSlug, $widget_packageID, $per_page = null, $current_page = null)
    {
        $requestUrl = $this->widgetRoute->widgetListUrl($accountSlug, $widget_packageID, [
            'per_page' => $per_page,
            'current_page' => $current_page
        ]);

        return $this->request('GET', $requestUrl);
    }

    public function updateWidget($accountSlug, $widget_packageID, $widget_id, $data)
    {
        $requestUrl = $this->widgetRoute->widgetUpdateUrl($accountSlug, $widget_packageID, $widget_id);

        return $this->request('PATCH', $requestUrl, $data);
    }
}
