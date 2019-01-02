<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:00
 */

namespace Nerio\Payment;


use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->config();
    }

    protected function config()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/payment.php', 'payment');

        $this->publishes([
            __DIR__ . '/../config' => config_path()
        ], 'payment');
    }
}
