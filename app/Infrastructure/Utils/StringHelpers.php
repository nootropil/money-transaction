<?php
declare(strict_types=1);

namespace App\Infrastructure\Utils;


final class StringHelpers
{
    /**
     * @param $content
     * @param $start
     * @param $end
     * @return null|string
     */
    public static function getBetween($content, $start, $end): ?string
    {
        $r = explode($start, $content);

        if (isset($r[1])) {
            $r = explode($end, $r[1]);

            return $r[0];
        }

        return null;
    }
}