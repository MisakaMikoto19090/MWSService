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

namespace MWSService\Samples;

use DOMDocument;
use MWSService\Orders\Base\MWSException;
use MWSService\Orders\Base\MWSInterface;
use MWSService\Orders\Model;

Class ListOrderItemsSample
{
    public static function GetOrderItems($amazon_order_id)
    {

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
 * sample for List Order Items Action
 ***********************************************************************/
// @TODO: set request. Action can be passed as  Model\MWSOrdersModelListOrderItems
$request = new  Model\MWSOrdersModelListOrderItemsRequest();
$request->setSellerId(MERCHANT_ID);
// object or array of parameters
invokeListOrderItems($service, $request);

/**
 * Get List Order Items Action Sample
 * Gets competitive pricing and related information for a product identified by
 * the MarketplaceId and ASIN.
 *
 * @param MWSInterface $service instance of MWSInterface
 * @param mixed $request Model\MWSOrdersModelListOrderItems or array of parameters
 */

function invokeListOrderItems(MWSInterface $service, $request)
{
    try {
        $response = $service->ListOrderItems($request);

        echo("Service Response\n");
        echo("=============================================================================\n");

        $dom = new DOMDocument();
        $dom->loadXML($response->toXML());
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        echo $dom->saveXML();
        echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");

    } catch (MWSException $ex) {
        echo("Caught Exception: " . $ex->getMessage() . "\n");
        echo("Response Status Code: " . $ex->getStatusCode() . "\n");
        echo("Error Code: " . $ex->getErrorCode() . "\n");
        echo("Error Type: " . $ex->getErrorType() . "\n");
        echo("Request ID: " . $ex->getRequestId() . "\n");
        echo("XML: " . $ex->getXML() . "\n");
        echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
    }
}
