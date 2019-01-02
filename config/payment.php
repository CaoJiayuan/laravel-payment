<?php
/**
 * Created by PhpStorm.
 * User: cjy
 * Date: 2019/1/2
 * Time: 10:00
 */


return [
    'default' => env("PAYMENT_DEFAULT", 'alipay'),

    'drivers' => [
        'alipay' => [
            'app_id' => '',
            'notify_url' => '',
            'return_url' => '',
            'ali_public_key' => '',
            // 加密方式： **RSA2**
            'private_key' => '',
            'log' => [ // optional
                'file' => storage_path('/logs/alipay.log'),
                'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
                'type' => 'single', // optional, 可选 daily.
                'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
            ],
            'http' => [ // optional
                'timeout' => 5.0,
                'connect_timeout' => 5.0,
                // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
            ],
            'mode' => 'dev',
        ],
        'wechat' => [
            'appid' => 'wxb3fxxxxxxxxxxx', // APP APPID
            'app_id' => 'wxb3fxxxxxxxxxxx', // 公众号 APPID
            'miniapp_id' => 'wxb3fxxxxxxxxxxx', // 小程序 APPID
            'mch_id' => '14577xxxx',
            'key' => 'mF2suE9sU6Mk1Cxxxxxxxxxxx',
            'notify_url' => '',
            'cert_client' => './cert/apiclient_cert.pem', // optional，退款等情况时用到
            'cert_key' => './cert/apiclient_key.pem',// optional，退款等情况时用到
            'log' => [ // optional
                'file' => storage_path('/logs/wechat.log'),
                'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
                'type' => 'single', // optional, 可选 daily.
                'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
            ],
            'http' => [ // optional
                'timeout' => 5.0,
                'connect_timeout' => 5.0,
                // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
            ],
            'mode' => 'dev', // optional, dev/hk;当为 `hk` 时，为香港 gateway。
        ]
    ]
];
