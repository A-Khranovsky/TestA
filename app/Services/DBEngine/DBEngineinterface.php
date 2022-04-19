<?php


namespace App\Services\DBEngine;


interface DBEngineinterface
{
    public function storeLocation($latitude, $logitude, $responseResult = []);
}
