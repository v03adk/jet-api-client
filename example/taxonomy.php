<?php

include_once __dir__ . '/../vendor/autoload.php';
use Jet\ApiClient\SecurityClient;
use Jet\ApiClient\TaxonomyClient;

$url = "https://merchant-api.jet.com/api";
// you can take $url from config file in your application for example
$client = new SecurityClient("user", "user", $url);

$token = $client->token();

if ($token) {

    $taxonomyClient = new TaxonomyClient($url, $token['id_token']);
    // get first 1000 links
    $links = $taxonomyClient->links('v1', 0);

    // get nodes info
    foreach ($links as $link)
    {
        $node = $taxonomyClient->nodes($link);
        // make something with node
    }

    // get nodes attributes
    foreach ($links as $link)
    {
        $nodeAttributes = $taxonomyClient->nodesAttributes($link);
        // make something with attribute
    }

} else {
    // try again
}
