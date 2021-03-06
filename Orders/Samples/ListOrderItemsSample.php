<?php
/*******************************************************************************
 * Copyright 2009-2017 Amazon Services. All Rights Reserved.
 * Licensed under the Apache License, Version 2.0 (the "License");
 *
 * You may not use this file except in compliance with the License.
 * You may obtain a copy of the License at: http://aws.amazon.com/apache2.0
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *******************************************************************************
 * PHP Version 5
 * @category Amazon
 * @package  Marketplace Web Service Orders
 * @version  2013-09-01
 * Library Version: 2017-02-22
 * Generated: Thu Mar 02 12:41:08 UTC 2017
 */

/**
 * List Order Items Sample
 */

namespace MWSService\Orders\Samples;

use DOMDocument;
use MWSService\MWSDefine;
use MWSService\Orders\Base\MWSOrdersException;
use MWSService\Orders\Base\MWSOrdersInterface;
use MWSService\Orders\Model\MWSOrdersModelListOrderItemsRequest;
use MWSService\Orders\OrdersCommon;
use SimpleXMLElement;

Class ListOrderItemsSample extends OrdersCommon
{
    /**
     * @param $AmazonOrderId
     * @param int $Flag
     * @return mixed|SimpleXMLElement
     */
    public static function ListOrderItems($AmazonOrderId = null, $Flag = 1)
    {
        $service = parent::GetMWSOrdersClient();
        $request = new MWSOrdersModelListOrderItemsRequest();
        $request = self::SetRequestParams($request, $AmazonOrderId);
        return self::invokeListOrderItems($service, $request, $Flag);
    }

    /**
     * @param $request
     * @param $AmazonOrderId
     * @return mixed
     */
    private static function SetRequestParams($request, $AmazonOrderId)
    {
        try {
            $request->setSellerId(MWSDefine::MERCHANT_ID);
            if ($AmazonOrderId) {
                $request = $request->setAmazonOrderId($AmazonOrderId);
            } else {
                throw new MWSOrdersException(['Message' => 'AmazonOrderId Must Be Set']);
            }
            return $request;
        } catch (MWSOrdersException $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
        }
    }

    /**
     * @param MWSOrdersInterface $service
     * @param $request
     * @param $Flag
     * @return mixed|SimpleXMLElement
     */
    private static function invokeListOrderItems(MWSOrdersInterface $service, $request, $Flag)
    {
        try {
            $response = $service->ListOrderItems($request);
            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $xml = $dom->saveXML();
            $result = new SimpleXMLElement($xml);//convert to xml object
            if ($Flag) {
                $result_json = json_encode($result, true);
                $result = json_decode($result_json, true);//convert to array
            }
            return $result;
        } catch (MWSOrdersException $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
            echo("Response Status Code: " . $ex->getStatusCode() . "\n");
            echo("Error Code: " . $ex->getErrorCode() . "\n");
            echo("Error Type: " . $ex->getErrorType() . "\n");
            echo("Request ID: " . $ex->getRequestId() . "\n");
            echo("XML: " . $ex->getXML() . "\n");
            echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
        }
    }
}

