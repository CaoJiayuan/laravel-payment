<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:25
 */

namespace Nerio\Payment;

use Yansongda\Pay\Gateways\Alipay;
use Yansongda\Pay\Gateways\Wechat;

/**
 * @method static Alipay alipay() 支付宝
 * @method static Wechat wechat() 微信
 * @package Nerio\Payment
 */
class Manager
{

    protected static $drivers = [];
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function use($driver = null)
    {
        return $this->getDriver($driver ?: $this->config['default']);
    }

    protected function getDriver($name)
    {
        if (array_key_exists($name, static::$drivers)) {
            return call_user_func(static::$drivers[$name], array_get($this->config, 'drivers.' . $name));
        }

        throw new UnsupportedDriverException("driver [$name] not registered");
    }

    public static function extend($name, \Closure $callback)
    {
        static::$drivers[$name] = $callback;
    }


    public static function __callStatic($name, $arguments)
    {
        $instance = new static(config('payment'));

        return $instance->use($name);
    }
}
