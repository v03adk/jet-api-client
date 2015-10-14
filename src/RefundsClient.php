<?php

namespace Jet\ApiClient;

class RefundsClient extends BaseClient
{
    /**
     * Poll Jet.com using refund status
     *
     * @param $status Created, Processing, Accepted, Rejected
     *
     * @return array|json sku_urls List of URLs
     */
    public function getByStatus($status)
    {
        $url = "/refunds/{$status}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res, 201);
    }


    /**
     * Poll this method via GET to receive the status of the refund. The merchant may also poll with {alt_refund_id} to receive the state of a refund
     *
     * @param $id refund_id|alt_refund_id
     *
     * @return array|json
     */
    public function getState($id)
    {
        $url = "/refunds/state/{$id}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * Jet.com API method sets refund details and returns a refund authorization ID
     *
     * @param $orderId
     * @param $altRefundId
     * @param $data
     *
     * @return array|data
     */

    public function post($orderId, $altRefundId, $data)
    {
        $url = "/refunds/{$orderId}/{$altRefundId}";

        $res = $this->transport->post($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res, 201);
    }
}