<?php

namespace Jet\ApiClient;

class SettlementClient extends BaseClient
{
    /**
     * receive json like
     * {
    "settlement_report_urls": [
    "/settlement/report/57e542a613fa42d8b6e8362dbd5911f5",
    "/settlement/report/a10b4b28467c490984e0b387e1cc2d9a",
    "/settlement/report/32c05c3230fc498e95f82129efd10213"
    ]
    }
    *
    */
    public function settlement($days)
    {
        $url = "/settlement/settlement/{$days}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        $this->processResult($res);
    }


    /**
     * receive json like
     * {
    "settlement_report_id": "002d7b66c1794190b3d2985826462893",
    "settlement_state": "deposited",
    "currency": "dollars",
    "unavailable_balance": 4102.2,
    "settlement_period_start": "2014-07-24T00:00:00Z",
    "settlement_period_end": "2014-07-24T23:59:59.9999999Z",
    "order_balance_details": {
    "merchant_price": 4012.45,
    "jet_variable_commission": -401.25,
    "fixed_commission": -120.37,
    "tax": 351.09,
    "shipping_revenue": 672.0,
    "shipping_tax": 58.8,
    "shipping_charge": 0.0,
    "fulfillment_fee": 0.0,
    "product_cost": 0.0
    },
    "order_balance": 4572.72,
    "return_balance_details": {
    "merchant_price": -325.72,
    "jet_variable_commission": 32.57,
    "fixed_commission": 13.03,
    "tax": -28.5,
    "shipping_tax": -7.0,
    "merchant_return_charge": 0.0,
    "return_processing_fee": 0.0,
    "product_cost": 0.0
    },
    "return_balance": -315.62,
    "jet_adjustment": 0.0,
    "settlement_value": 4257.1
    }
     *
     */

    public function report($link)
    {
        $res = $this->transport->get($link, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        $this->processResult($res);
    }


    /**
     *
     */

    public function reportOrders($link)
    {
        $url = $link . '/orders';

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
                'Authorization: Bearer '.$this->idToken)));

        $this->processResult($res);
    }


    /**
     *
     */

    public function reportReturns($link)
    {
        $url = $link . '/returns';

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
                'Authorization: Bearer '.$this->idToken)));

        $this->processResult($res);
    }
}