<?php


namespace App\Services\GeoCodeParser;


interface GeoCodeParserinterface
{
    public function findLocation(array $source, string $param);
    public function findAddress(array $source);
}
