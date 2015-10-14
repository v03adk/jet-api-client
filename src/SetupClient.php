<?php

namespace Jet\ApiClient;

class SetupClient extends BaseClient
{
    /**
     * @return array
     */
    public function getFulfillmentNodes()
    {
        $res = $this->transport->get('/setup/fulfillmentNodes', ['headers' => ['content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken]]);

        $this->processResult($res);
    }
}