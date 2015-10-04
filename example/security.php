<?php

include_once __dir__ . '/../vendor/autoload.php';
use Jet\ApiClient\SecurityClient;

$url = "https://merchant-api.jet.com/api";
// you can take $url from config file in your application for example
$client = new SecurityClient("user", "user", $url);

$token = $client->token();

if ($token) {

    // store id_token somewhere, it's valid for 10 hours
    // or generate it with every request

    echo $token['id_token'];

    // see other examples

} else {
    // try again
}
