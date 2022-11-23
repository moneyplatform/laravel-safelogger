<?php

declare(strict_types=1);

namespace Moneyplatform\SafeLogger\Helpers;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LogHelper
 */
class LogHelper
{
    /**
     * Remove hidden fields from the log
     *
     * @param  mixed|null  $object
     * @param  int  $depth
     * @param  array  $extraHiddenFields
     * @return mixed
     */
    public static function filterAndToArray(mixed $object, int $depth = 2, array $extraHiddenFields = []): mixed
    {
        $replaceKeys = config('safelogger.replaceKeys', []);
        $hiddenFields = config('safelogger.hiddenFields', []);
        $hiddenFields = array_merge($hiddenFields, $extraHiddenFields);

        if ($depth <= 0) {
            if (is_array($object)) {
                return '<array>';
            }
            if (is_object($object)) {
                return '<object>';
            }
        }
        if (! is_array($object) && ! is_object($object)) {
            return $object;
        }

        $depth--;
        $result = [];
        $array = self::objectToArray($object);
        foreach ($array as $key => $value) {
            if (in_array($key, $hiddenFields, true)) {
                continue;
            }

            if (isset($replaceKeys[$key])) {
                $key = $replaceKeys[$key];
            }

            $result[$key] = $value;
            if (is_array($value) || is_object($value)) {
                $result[$key] = self::filterAndToArray($value, $depth, $extraHiddenFields);
            }
        }

        return $result;
    }

    /**
     * @param  mixed  $object
     * @return mixed
     */
    private static function objectToArray(mixed $object): mixed
    {
        if (! is_object($object)) {
            return $object;
        }

        if ($object instanceof Model) {
            return $object->toArray();
        }

        return get_object_vars($object);
    }
}
