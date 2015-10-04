<?php

namespace Jet\ApiClient;

use GuzzleHttp\Client as GuzzleClient;

class TaxonomyClient
{
    private $url;
    private $idToken;

    public function __construct($url, $idToken)
    {
        $this->url = $url;
        $this->idToken = $idToken;
    }


    /**
     * receive json like
     * {
         "node_urls": [
            "/taxonomy/nodes/2000034",
            "/taxonomy/nodes/2000158",
            "/taxonomy/nodes/2000061"
         }
       }
     */

    // max limit is 1000
    public function links($version, $offset, $limit = 1000)
    {
        $guzzleclient = new GuzzleClient();
        $url = $this->url . "/taxonomy/links/{$version}?offset={$offset}&limit={$limit}";

        $res = $guzzleclient->get($url, ['headers' => ['content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken]]);



        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true)['node_urls'];
        }
    }


    /**
     * receive json like
     * {
            "jet_node_id": 9000218,
            "jet_node_name": "Dresses",
            "jet_node_path": "Clothing, Shoes & Accessories/Women's Clothing/Dresses",
            "amazon_node_ids": [
            9000990
            ],
            "parent_id": 9000213,
            "jet_level": 2,
            "suggested_tax_code": "all_purpose"
        }

     *
     */

    public function nodes($link)
    {
        $guzzleclient = new GuzzleClient();
        $url = $this->url . $link;

        $res = $guzzleclient->get($url, ['headers' => ['content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken]]);

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true);
        }
    }


    /**
     *  receive json like
        {
            "attributes": [
                {
                    "attribute_id": 2,
                    "attribute_description": "Color Map",
                    "free_text": false,
                    "variant": false,
                    "values": [
                    "Beige",
                    "Black",
                    "Blue",
                    "Brown",
                    "Clear",
                    "Gold",
                    "Green",
                    "Grey",
                    "Multi-Colored",
                    "Orange",
                    "Pink",
                    "Purple",
                    "Red",
                    "Silver",
                    "White",
                    "Yellow"
                    ]
                },
                {
                    "attribute_id": 95,
                    "attribute_description": "Count Size",
                    "free_text": true,
                    "variant": true,
                    "validation": {
                    "data_type": "integer",
                    "max_value": 1000000,
                    "min_value": 1
                    }
                }
            ]
        }
     */

    public function nodesAttributes($link)
    {
        $guzzleclient = new GuzzleClient();
        $url = $this->url . $link . '/attributes';

        $res = $guzzleclient->get($url, ['headers' => ['content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken]]);

        if ($res->getStatusCode() == 200) {
            return json_decode($res->getBody(), true)['attributes'];
        }
    }
}