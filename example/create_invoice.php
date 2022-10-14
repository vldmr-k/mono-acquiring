<?php

require __DIR__ . '/../vendor/autoload.php';

$token = getenv("MONO_XTOKEN");
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$merchantPaymInfo = new \VldmrK\MonoAcquiring\Query\Invoice\MerchantPaymInfo("SO-500", "Payment for order #SO-500");
$merchantPaymInfo->addBasketOrder(new \VldmrK\MonoAcquiring\Query\Invoice\BasketOrder("Product 1", 1, 100, "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Big_buck_bunny_poster_big.jpg/800px-Big_buck_bunny_poster_big.jpg"));
$query = new \VldmrK\MonoAcquiring\Query\Invoice\CreateQuery(100, $merchantPaymInfo);

$response = $api->call($query);

print_r($response->toArray()); // ["invoiceId" => ".....", "pageUrl" => "...."]

