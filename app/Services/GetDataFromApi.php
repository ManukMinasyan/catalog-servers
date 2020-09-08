<?php

namespace App\Services;

use App\Services\Interfaces\GetDataFromApi as GetDataFromApiInterface;

class GetDataFromApi implements GetDataFromApiInterface
{
    private $ch;
    private $response;
    private string $url;
    private $data;

    public function __construct()
    {
        $this->url = 'https://old.my.inxy.com/json/servers_catalog.json';
        $this->data = $this->init();
    }

    /**
     * send request to api server
     * @return GetDataFromApi;
     */
    public function send(): GetDataFromApi
    {
        $this->response = (object)array_merge(["data" => curl_exec($this->ch)], curl_getinfo($this->ch),);
        return $this;
    }

    /**
     * configuration for curl request
     * @return GetDataFromApi
     */
    public function curlConfig(): GetDataFromApi
    {
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        return $this;
    }

    /**
     * create Curl instance
     * @return GetDataFromApi
     */
    public function createCurlInstance(): GetDataFromApi
    {
        $this->ch = curl_init();
        return $this;
    }

    /**
     * Close Curl
     * @return GetDataFromApi
     */
    public function closeCurl(): GetDataFromApi
    {
        curl_close($this->ch);
        return $this;
    }

    /**
     * initialize service
     * @return int|mixed
     */
    public function init()
    {
        $this->createCurlInstance()->curlConfig()->send()->closeCurl();
        if ($this->response->http_code == 200) {
            return json_decode($this->response->data);
        }
        return 0;
    }

    /**
     * getter for data property
     * @return int|mixed
     */
    public function getData()
    {
        return $this->data;
    }

}
