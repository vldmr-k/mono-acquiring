<?php

require __DIR__ . '/../vendor/autoload.php';

$token = getenv("MONO_XTOKEN");
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$response = $api->execute("/api/merchant/qr/list", "GET", [], new \VldmrK\MonoAcquiring\Mapper\RawMapper());

print_r($response->toArray()); // ['raw' => '[json-string]']
print_r($response->raw); // [json-string]

