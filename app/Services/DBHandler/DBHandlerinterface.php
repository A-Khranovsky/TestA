<?php

namespace App\Services\DBHandler;

interface DBHandlerinterface
{
    public function storeLocation(array $haystack, string $latitude, string $longitude);
}
