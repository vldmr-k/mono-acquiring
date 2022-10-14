<?php

require __DIR__ . '/../vendor/autoload.php';

$token = getenv("MONO_XTOKEN");
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$response = $api->call(new \VldmrK\MonoAcquiring\Query\DetailsQuery());

print_r($response); // ([merchantId] => test_A4EaPDryzz [merchantName] => Test Caption)

