<?php


namespace ForOverReferralsLib\Controllers;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Base controller
 */
class BaseController
{
    /**
     * @throws Exception|GuzzleException
     */
    protected function request($method, $url, $data = [])
    {
        $client = new Client([
            'headers' => $this->headers
        ]);

        try {

            $response = $client->request($method, $url,['form_params' => $data]);
        } catch (ClientException $e){
            $response = $e->getResponse();
        }

        $this->validateResponse($response);

        return (array) json_decode($response->getBody()->getContents());
    }

    /**
     * @throws Exception
     */
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
