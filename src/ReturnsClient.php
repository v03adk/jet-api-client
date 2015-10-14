<?php

namespace Jet\ApiClient;

class ReturnsClient extends BaseClient
{
    /**
     * Note: The acknowledgement of the return is no longer required.  Returns can now be set straight to complete.  Please see “How to Configure Returns” for more information.
     *
     * @param $id return_id
     * @param $data json
     */
    public function putAcknowledge($id, $data)
    {
        $url = "/returns/{$id}/acknowledge";

        $res = $this->transport->put($url, $data, ['headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)]);

        return $this->processResult($res);
    }

    /**
     * Jet.com API method provides notification that a return is processed
     *
     * @param $id return_id
     * @param $data json
     */
    public  function putComplete($id, $data)
    {
        $url = "/returns/{$id}/complete";

        $res = $this->transport->put($url, ['headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data]);

        return $this->processResult($res);
    }

    /**
     * Jet.com API method retrieves URLs with the details for a return in the requested status
     *
     * @param status "created", "acknowledged", "refund customer without return", "completed by merchant"
     *
     * @return array|json List of return URLs key is return_urls
     */
    public function getByStatus($status)
    {
        $url = "/returns/{$status}";

        $res = $this->transport->get($url, ['headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)]);

        return $this->processResult($res);
    }

    /**
     * Poll Jet.com  using GET to retrieve all details for a return
     *
     * @param $url url from getByStatus
     *
     * @return array|json return details
     */

    public function getState($url)
    {
        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }
}