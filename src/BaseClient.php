<?php

namespace Jet\ApiClient;

use GuzzleHttp\Client as GuzzleClient;

class BaseClient {

    protected $output;
    protected $url;
    protected $transport;
    protected $idToken;

    public function __construct($config, $idToken)
    {
        $this->url = $config['jet_api_endpoint'];
        $this->output = $config['jet_output'];
        $this->transport = new GuzzleClient(['base_uri' => $this->url]);
        $this->idToken = $idToken;
    }

    protected function processResult($result, $successCode = 200)
    {
        if ($result->getStatusCode() == $successCode)
        {
            if ($this->output == 'array')
                return json_decode($result->getBody(), true);
            return $result->getBody();
        }
    }
}