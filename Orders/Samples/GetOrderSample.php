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
 * Get Order Sample
 */

namespace MWSService\Orders\Samples;

use DOMDocument;
use MWSService\MWSDefine;
use MWSService\Orders\Base\MWSOrdersException;
use MWSService\Orders\Base\MWSOrdersInterface;
use MWSService\Orders\Model\MWSOrdersModelGetOrderRequest;
use MWSService\Orders\OrdersCommon;
use SimpleXMLElement;

Class GetOrderSample extends OrdersCommon
{
    public static function GetOrder($AmazonOrderId, $Flag = 1)
    {
        $service = parent::GetMWSOrdersClient();
        $request = new MWSOrdersModelGetOrderRequest();
        $request->setSellerId(MWSDefine::MERCHANT_ID);
        $request = self::SetRequestParams($request, $AmazonOrderId);
// object or array of parameters
        return self::invokeGetOrder($service, $request, $Flag);

    }

    public static function SetRequestParams($request, $AmazonOrderId)
    {
        if ($AmazonOrderId) {
            $request = $request->setAmazonOrderId($AmazonOrderId);
        }
        return $request;
    }

    /**
     * Get Get Order Action Sample
     * Gets competitive pricing and related information for a product identified by
     * the MarketplaceId and ASIN.
     *
     * @param MWSOrdersInterface $service instance of MWSOrdersInterface
     * @param mixed $request Model\MWSOrdersModelGetOrder or array of parameters
     */

    public static function invokeGetOrder(MWSOrdersInterface $service, $request, $Flag)
    {
        try {
            $response = $service->GetOrder($request);

//            echo("Service Response\n");
//            echo("=============================================================================\n");

            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $xml = $dom->saveXML();
            $result = new SimpleXMLElement($xml);
            if ($Flag) {
                $result_json = json_encode($result, true);
                $result = json_decode($result, true);
            }
            return $result;
//            echo $dom->saveXML();
//            echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

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


/************************************************************************
 * Uncomment to try out Mock Service that simulates MarketplaceWebServiceOrders
 * responses without calling MarketplaceWebServiceOrders service.
 *
 * Responses are loaded from local XML files. You can tweak XML files to
 * experiment with various outputs during development
 *
 * XML files available under MarketplaceWebServiceOrders/Mock tree
 *
 ***********************************************************************/
// $service = new MWSMock();

/************************************************************************
 * Setup request parameters and uncomment invoke to try out
 * sample for Get Order Action
 ***********************************************************************/




