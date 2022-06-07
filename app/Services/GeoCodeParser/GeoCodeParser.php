<?php


namespace App\Services\GeoCodeParser;


class GeoCodeParser
{
    public function findLocation(array $source, string $param)
    {
        $i = 0;
        $stack = [];
        $result = [];
        array_walk_recursive($source, function ($item, $key)
        use (&$param, &$stack, &$result, &$i) {
            $stack[$i] = [$key, $item];
            if ($item === $param) {
                if (count($result) == 0) {
                    $result['short_name'] = $stack[$i - 1][1];
                    $result['long_name'] = $stack[$i - 2][1];
                }
            }
            $i++;
        });
        return $result;
    }

    public function findAddress(array $source)
    {
        $i = 0;
        $stack = [];
        $result = [];
        array_walk_recursive($source, function ($item, $key)
        use (&$param, &$stack, &$result, &$i) {
            $stack[$i] = [$key, $item];
            if ($key === 'formatted_address') {
                if (count($result) == 0) {
                    $result['formatted_address'] = $stack[$i][1];
                }
            }
            $i++;
        });
        return $result;
    }
}
