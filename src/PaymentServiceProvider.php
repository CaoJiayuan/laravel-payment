<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:00
 */

namespace Nerio\Payment;


use Illuminate\Support\ServiceProvider;
use Yansongda\Pay\Pay;

class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->config();

        $this->registerManager();
    }

    protected function config()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/payment.php', 'payment');

        $this->publishes([
            __DIR__ . '/../config' => config_path()
        ], 'payment');
    }

    protected function registerManager()
    {
        Manager::extend('alipay', function ($config) {
            return Pay::alipay($config);
        });

        Manager::extend('wechat', function ($config) {
            return Pay::wechat($config);
        });
    }
}
