<?php

include_once __dir__ . '/../vendor/autoload.php';
use Jet\ApiClient\SecurityClient;
use Jet\ApiClient\TaxonomyClient;

$config['jet_api_endpoint'] = "https://merchant-api.jet.com/api";
$config['jet_user'] = "user";
$config['jet_password'] = "password";
$config['jet_output'] = "array";

$client = new SecurityClient($config);

$token = $client->token();

if ($token) {

    $taxonomyClient = new TaxonomyClient($config, $token['id_token']);
    // get first 1000 links
    $links = $taxonomyClient->links('v1', 0);

    // get nodes info
    foreach ($links['node_urls'] as $link)
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
