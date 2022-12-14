### Monobank Acquiring PHP SDK

Unofficial SDK for Monobank Acquiring. https://api.monobank.ua/docs/acquiring.html

### Examples


###### Retrieve public key
```php
$token = '...';
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$response = $api->call(new \VldmrK\MonoAcquiring\Query\PubkeyQuery());

print_r($response->toArray()); // ['key' => '....']
```

###### Merchant Details
```php
$token = '...';
$config = new \VldmrK\MonoAcquiring\Config($token);

$api = new \VldmrK\MonoAcquiring\Api($config);

$response = $api->call(new \VldmrK\MonoAcquiring\Query\DetailsQuery());

print_r($response); // [ 'merchantId' => 'test_A4EaPDryzz', 'merchantName' => 'Test Caption']
```

More example you can find here [example/](example/). Before run example, please set global variable `MONO_XTOKEN`


### Run Test
```shell script
make build
make unit
```

### Coverage

After run tests, you can check coverage of code
```shell script
make serve
```

After that, coverage report will be available by address http://0.0.0.0:8080/spec/_coverage/index.html
