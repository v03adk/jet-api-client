<?php

include_once __dir__ . '/../vendor/autoload.php';
use Jet\ApiClient\SecurityClient;

$config['jet_api_endpoint'] = "https://merchant-api.jet.com/api";
$config['jet_user'] = "user";
$config['jet_password'] = "password";
$config['jet_output'] = "array";

$client = new SecurityClient($config);

$token = $client->token();

if ($token) {

    // store id_token somewhere, it's valid for 10 hours
    // or generate it with every request

    echo $token['id_token'];

    // see other examples

} else {
    // try again
}