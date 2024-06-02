<?php

namespace App\Helpers;

use App\Models\GlobalConfig;
use App\Models\LandLease;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    /**
     * @param $key
     * @param bool $array
     *
     * @return array|null
     */
    public static function get_config($key, $array = FALSE)
    {

        $config = GlobalConfig::where('key', $key)->first();
        if ($array) {
            $value = [];
            if ($config !== NULL) {
                $value = explode(',', trim($config->value));
            }
        } else {
            $value = NULL;
            if ($config !== NULL) {
                $value = trim($config->value);
            }
        }

        return $value;
    }
    public static function isLease($dag_list_id)
    {

        $data = LandLease::where(['dag_list_id' => $dag_list_id, 'status' => 'ACTIVE'])->first();

        return $data ? true : false;
    }
    public static function getSession()
    {
        $data = [];
        $c_date = now()->year;
        for ($i = 2010; $i <= $c_date; $i++) {
            $data[] = $i . '-' . $i + 1;
        }

        return $data;
    }
    public static function get_user_by_dag_list($dag_list_id)
    {
        $result = LandLease::where(['dag_list_id' => $dag_list_id, 'status' => 'ACTIVE'])->first();
        return $result ?? null;
    }
}
