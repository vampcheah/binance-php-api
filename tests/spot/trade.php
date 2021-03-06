<?php


/**
 * @author francis
 *
 * Fill in your key and secret and pass can be directly run
 *
 * Most of them are unfinished and need your help
 * */
use Vampcheah\Exchange\Binance;

require __DIR__ .'../../../vendor/autoload.php';

include 'key_secret.php';

$binance=new Binance($key,$secret);

$binance->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,

    //If you are developing locally and need an agent, you can set this
    //'proxy'=>true,
    //More flexible Settings
    /* 'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ], */
    //Close the certificate
    //'verify'=>false,
]);

//Send in a new order.
try {
    $result=$binance->trade()->postOrder([
        'symbol'=>'LTCUSDT',
        'side'=>'SELL',
        'type'=>'LIMIT',
        'quantity'=>'0.1',
        'price'=>'200',
        'timeInForce'=>'GTC',
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Check an order's status.
try {
    $result=$binance->user()->getOrder([
        'symbol'=>'LTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Cancel an active order.
try {
    $result=$binance->trade()->deleteOrder([
        'symbol'=>'LTCUSDT',
        'orderId'=>$result['orderId'],
        'origClientOrderId'=>$result['clientOrderId'],
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
