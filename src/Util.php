<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:31
 */

namespace Nerio\Payment;


class Util
{

    public static function getOrderNumber($length = 32, $append = null)
    {
        if ($length < 14) {
            $length = 14;
        }
        if (!is_null($append)) {
            $append = '-' . $append;
        }

        return date('YmdHis') . self::randNumber($length - 14) . $append;
    }

    public static function randNumber($length)
    {
        if ($length == 0) {
            return '';
        }
        $seed = '1234567890';

        return substr(str_shuffle(str_repeat($seed, $length)), 0, $length);
    }
}
