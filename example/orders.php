<?php

// https://developer.jet.com/data-flow-documentation#jet-orders orders workflow
// https://developer.jet.com/docs/services/553108a39a274a0b2cfd2773/operations/553108a49a274a149ccca08e orders schema

include_once __dir__ . '/../vendor/autoload.php';
use Jet\ApiClient\SecurityClient;
use Jet\ApiClient\OrdersClient;

$config['jet_api_endpoint'] = "https://merchant-api.jet.com/api";
$config['jet_user'] = "user";
$config['jet_password'] = "password";
$config['jet_output'] = "array";

$client = new SecurityClient($config);

$token = $client->token();

if ($token) {

    $ordersClient = new OrdersClient($config, $token['id_token']);

    $ordersReady = $ordersClient->getByStatus('ready');
    if ($ordersReady)
    {
        foreach ($ordersReady['order_urls'] as $orderUrl)
        {
            $orderDetails = $ordersClient->getWithoutShipmentDetail($orderUrl);
            // save order. check order.

            $orderId = $orderDetails['merchant_order_id'];

            $data = json_encode(array()); // some data to accept order, see api schema

            $ordersClient->putAcknowledge($orderId, $data);


            //after shipping
            $data = json_encode(array()); // some data that order shipped, see api schema

            $ordersClient->putShipped($orderId, $data);
        }
    }

} else {
    // try again
}