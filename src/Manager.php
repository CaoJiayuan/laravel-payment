<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:25
 */

namespace Nerio\Payment;


use Yansongda\Pay\Pay;

class Manager
{

    public static function alipay()
    {
        return Pay::alipay(config('payment.drivers.alipay'));
    }

    public static function wechat()
    {
        return Pay::wechat(config('payment.drivers.wechat'));
    }
}
