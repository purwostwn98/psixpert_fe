<?php

namespace App\Libraries;

use GeneratingResult;

class ApiHelper
{
    protected $host_api;
    protected $session;
    protected $curl;
    protected $token;
    private static $instance = null;

    public function __construct()
    {
        $this->host_api = getenv('endpoint');
        $this->session = \Config\Services::session();
        $this->curl = curl_init();
        $this->token =  $this->session->get('token');
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ApiHelper();
        }

        return self::$instance;
    }


    public function post($endpoint, $data, $obj = False)
    {

        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->host_api . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $this->token,
            ),
        ));

        $response = curl_exec($this->curl);
        curl_close($this->curl);

        if ($obj) {
            return json_decode($response);
        }
        $response = json_decode($response, true);
        return $response;
    }


    public function get($endpoint, $obj = False)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->host_api . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        if ($obj) {
            return json_decode($response);
        }
        $response = json_decode($response, true);
        return $response;
    }


    public function put($endpoint, $data, $obj = False)
    {
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->host_api . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token,
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));

        $response = curl_exec($this->curl);
        curl_close($this->curl);
        if ($obj) {
            return json_decode($response);
        }
        $response = json_decode($response, true);
        return $response;
    }


    public function delete($endpoint, $obj = False)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->host_api . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $this->token,
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        if ($obj) {
            return json_decode($response);
        }
        $response = json_decode($response, true);
        return $response;
    }
}
