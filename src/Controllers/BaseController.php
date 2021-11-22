<?php


namespace ForOverReferralsLib\Controllers;

use Exception;
use ForOverReferralsLib\Routes\RedemptionRoute;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Base controller
 */
class BaseController
{

    /**
     * @var string[]
     */
    protected $headers;

    protected $accountSlug;

    public function __construct(string $authToken, string $accountSlug)
    {
        $this->headers = [
            'app-key' => $authToken,
            'Accept' => 'application/json'
        ];

        $this->accountSlug = $accountSlug;
    }

    protected function request($method, $url, $data = [])
    {

        $client = new Client([
            'headers' => $this->headers
        ]);

        $r = new \stdClass();

        try {
            $response = $client->request($method, $url, ['form_params' => $data]);

//            $r->code = $response->getStatusCode();
//            $r->data = json_decode($response->getBody()->getContents());

        } catch (ClientException $e) {
            $response = $e->getResponse();

//            $r->code = $e->getCode();
//            $r->data = json_decode($response->getBody()->getContents());
//                $r->message = json_decode($response->getBody()->getContents())->message;

        }


        $this->validateResponse($response);

//        return $r;
//
        return (object)json_decode($response->getBody()->getContents());
    }

    protected function validateResponse($response)
    {
        if ($response->getStatusCode() == 401) {
            throw new Exception('You are not authenticated', 401);
        }

        if ($response->getStatusCode() == 403) {
            throw new Exception('User not authorized to perform the operation', 403);
        }

        if ($response->getStatusCode() == 404) {
            throw new Exception('Resource not found', 404);
        }

        if (($response->getStatusCode() < 200) || ($response->getStatusCode() > 208)) { //[200,208] = HTTP OK
            throw new Exception($response->getBody()->getContents(), $response->getStatusCode());
        }
    }
}
