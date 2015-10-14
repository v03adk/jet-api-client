<?php

namespace Jet\ApiClient;

class OrdersClient extends BaseClient
{
    /**
     * Jet.com API method to acknowledge a order that is ready to be fulfilled     *
     *
     * @param $id merchant_order_id
     * @param $data json
     */
    public function putAcknowledge($id, $data)
    {
        $url = "/orders/{$id}/acknowledge";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * Jet.com API method updates an order as shipped or canceled
     *
     * @param $id merchant_order_id
     * @param $data
     */
    public function putShipped($id, $data)
    {
        $url = "/orders/{$id}/shipped";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }


    /**
     * Jet.com API Method for Polling Orders by status to get order details URLs
     *
     * @param $status created, ready, acknowledged, inprogress, complete
     *
     * @return json|array List of Order URLs key is order_urls
     */
    public function getByStatus($status)
    {
        $url = "/orders/{$status}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * Jet.com API method for retrieving(by polling) URLs to cancelled order
     *
     * @return json|array List of URLs for orders that are cancelled
     */
    public function getDirectedCancel()
    {
        $url = "/orders/directedCancel";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * Poll Jet.com using GET to retrieve all order details
     *
     * @param $url url from getByStatus
     *
     * @return json|array order details
     */
    public function getWithoutShipmentDetail($url)
    {
        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }
}