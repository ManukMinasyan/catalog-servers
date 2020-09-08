<?php

namespace App\Services\Interfaces;

use App\Services\GetDataFromApi as GetDataFromApiClass;

interface GetDataFromApi
{

    /**
     * Send request to  api server
     *
     * @return GetDataFromApiClass
     */
    public function send(): GetDataFromApiClass;

    /**
     * configuration for curl request
     *
     * @return GetDataFromApiClass
     */
    public function curlConfig(): GetDataFromApiClass;

    /**
     * Create curl instance
     * @return resource
     */
    public function createCurlInstance(): GetDataFromApiClass;

    /**
     * Close Curl Connection
     * @return GetDataFromApiClass
     */
    public function closeCurl(): GetDataFromApiClass;

    /**
     * @return mixed
     */
    public function init();


}
