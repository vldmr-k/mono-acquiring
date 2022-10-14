<?php

require __DIR__ . '/../vendor/autoload.php';

$token = getenv("MONO_XTOKEN");
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$response = $api->call(new \VldmrK\MonoAcquiring\Query\PubkeyQuery());

print_r($response->toArray()); // ['key' => '....']

