<?php

namespace App\Services;

use Carbon\Carbon;

class TimestampsFormatter
{
    /**
     * @param array $data
     * @param array|string[] $keys
     * @return array
     */
    public static function format(array $data, array $keys = ['created_at', 'updated_at']): array
    {
        foreach ($keys as $key) {
            if (!array_key_exists($key, $data)) {
                continue;
            }

            $data[$key] = Carbon::make($data[$key]);

            if (is_null($data[$key])) {
                continue;
            }

            $data[$key] = $data[$key]->format(Carbon::DEFAULT_TO_STRING_FORMAT);
        }

        return $data;
    }
}
