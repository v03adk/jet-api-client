<?php

namespace Jet\ApiClient;

use GuzzleHttp\Client as GuzzleClient;

class SecurityClient
{
    private $user;
    private $password;
    private $output;
    private $url;

    public function __construct($config)
    {
        $this->user = $config['jet_user'];
        $this->password = $config['jet_password'];
        $this->output = $config['jet_output'];
        $this->url = $config['jet_api_endpoint'];
    }

    /**
     *  sending json like
     * {
            "user": "asikdjf89q34e9082udjfc90u3094u309eudjc0sd9f0s@jet.com",
            "pass": "39043248320948098f9jfogkvjnsdgfhsyuf893478324urejfsdf"
        }
     *
     * receiving json like
     * {
            "id_token": "asikdjf89q34e9082udjfc90u3094u309eudjc0sd9f0s@jet.com",
            "access_token": "39043248320948098f9jfogkvjnsdgfhsyuf893478324urejfsdf",
            "token_type": "bearer"
        }
     *
     */

    public function token()
    {
        if(empty($this->user) || empty($this->password) || empty($this->url))
            throw new \Exception("Provide information to get token", 500);

        $client = new GuzzleClient();

        $res = $client->post($this->url.'/token', ['headers' => ['content-type' => 'application/json'],
            'body' => json_encode(['user' => $this->user, 'pass' => $this->password])]);

        if ($res->getStatusCode() == 200) {
            if ($this->output == 'array')
                return json_decode($res->getBody(), true);
            return $res->getBody();
        }
    }
}