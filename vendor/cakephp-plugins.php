<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'CakeCaptcha' => $baseDir . '/vendor/captcha-com/cakephp-captcha/',
        'Captcha' => $baseDir . '/vendor/inimist/cakephp-captcha/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Siezi/SimpleCaptcha' => $baseDir . '/vendor/siezi/cakephp-simple-captcha/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/'
    ]
];