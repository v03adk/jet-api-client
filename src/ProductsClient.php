<?php

namespace Jet\ApiClient;

class ProductsClient extends BaseClient
{
    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkus($id, $data)
    {
        $url = "/merchant-skus/{$id}";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function deleteMerchantSkusImage($id, $data)
    {
        $url = "/merchant-skus/{$id}/image";

        $res = $this->transport->delete($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkusInventory($id, $data)
    {
        $url = "/merchant-skus/{$id}/inventory";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkusPrice($id, $data)
    {
        $url = "/merchant-skus/{$id}/price";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     *
     * @return json|array product data
     */
    public function getOneMerchantSkus($id)
    {
        $url = "/merchant-skus/{$id}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkusImage($id, $data)
    {
        $url = "/merchant-skus/{$id}/image";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }


    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     *
     * @return json|array quantity of inventory
     */
    public function getMerchantSkusInventory($id)
    {
        $url = "/merchant-skus/{$id}/inventory";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     *
     * @return json|array  price of the product
     */
    public function getMerchantSkusPrice($id)
    {
        $url = "/merchant-skus/{$id}/price";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data returns exception information for a merchant SKU
     */
    public function putMerchantSkusReturnsexception($id, $data)
    {
        $url = "/merchant-skus/{$id}/returnsexception";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data shipping exception information for a merchant SKU
     */
    public function putMerchantSkusShippingexception($id, $data)
    {
        $url = "/merchant-skus/{$id}/shippingexception";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }


    /**
     * Indicates whether the specified sku is archived
     *
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkusStatusArchive($id, $data)
    {
        $url = "/merchant-skus/{$id}/status/archive";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $id Merchant SKU – The unique identifier used by the merchant to identify the product
     * @param $data json data
     */
    public function putMerchantSkusVariation($id, $data)
    {
        $url = "/merchant-skus/{$id}/variation";

        $res = $this->transport->put($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken), 'body' => $data));

        return $this->processResult($res);
    }

    /**
     * @param $merchantSkuStatus Statuses: 'Processing', 'Missing Listing Data', 'Ready to List', 'Available for Purchase', 'Archived'
     * @param $startPoint
     * @param $resultsToReturn
     *
     * $return json|array sku_urls List of SKU URLs
     */

    public function getMerchantSkusByStatus($merchantSkuStatus, $startPoint, $resultsToReturn)
    {
        $url = "/merchant-skus/bystatus/{$merchantSkuStatus}/{$startPoint}/{$resultsToReturn}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }

    /**
     * @param $offset
     * @param $limit
     *
     * $return json|array sku_urls List of SKU URLs
     */
    public function getMerchantSkus($offset, $limit)
    {
        $url = "/merchant-skus?offset={$offset}&limit={$limit}";

        $res = $this->transport->get($url, array('headers' => array('content-type' => 'application/json',
            'Authorization: Bearer '.$this->idToken)));

        return $this->processResult($res);
    }
}