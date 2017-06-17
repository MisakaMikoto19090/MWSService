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
 * List Order Items By Next Token Sample
 */

namespace MWSService\Orders\Samples;

use DOMDocument;
use MWSService\MWSDefine;
use MWSService\Orders\Base\MWSOrdersException;
use MWSService\Orders\Base\MWSOrdersInterface;
use MWSService\Orders\Model\MWSOrdersModelListOrderItemsByNextTokenRequest;
use MWSService\Orders\OrdersCommon;
use SimpleXMLElement;

Class ListOrderItemsByNextTokenSample extends OrdersCommon
{
    /**
     * @param $NextToken
     * @param $Flag
     * @return mixed|SimpleXMLElement
     */
    public static function ListOrderItemsByNextTokenSample($NextToken, $Flag)
    {
        $service = parent::GetMWSOrdersClient();
        $request = new MWSOrdersModelListOrderItemsByNextTokenRequest();
        $request = self::SetRequestParams($request, $NextToken);

        return self::invokeListOrderItemsByNextToken($service, $request, $Flag);
    }

    /**
     * @param $request
     * @param $NextToken
     * @return mixed
     */
    private static function SetRequestParams($request, $NextToken)
    {
        $request->setSellerId(MWSDefine::MERCHANT_ID);
        if ($NextToken) {
            $request->setNextToken($NextToken);
        }
        return $request;
    }

    /**
     * @param MWSOrdersInterface $service
     * @param $request
     * @param $Flag
     * @return mixed|SimpleXMLElement
     */
    private static function invokeListOrderItemsByNextToken(MWSOrdersInterface $service, $request, $Flag)
    {
        try {
            $response = $service->ListOrderItemsByNextToken($request);

            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $xml = $dom->saveXML();
            $result = new SimpleXMLElement($xml);
            if ($Flag) {
                $result_json = json_encode($result, true);
                $result = json_decode($result_json, true);
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

/************************************************************************
 * Instantiate Implementation of MarketplaceWebServiceOrders
 *
 * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants
 * are defined in the .config.inc.php located in the same
 * directory as this sample
 ***********************************************************************/
// More endpoints are listed in the MWS Developer Guide
// North America:
//$serviceUrl = "https://mws.amazonservices.com/Orders/2013-09-01";
// Europe
//$serviceUrl = "https://mws-eu.amazonservices.com/Orders/2013-09-01";
// Japan
//$serviceUrl = "https://mws.amazonservices.jp/Orders/2013-09-01";
// China
//$serviceUrl = "https://mws.amazonservices.com.cn/Orders/2013-09-01";


$config = array(
    'ServiceURL' => $serviceUrl,
    'ProxyHost' => null,
    'ProxyPort' => -1,
    'ProxyUsername' => null,
    'ProxyPassword' => null,
    'MaxErrorRetry' => 3,
);

$service = new MWSOrdersClient(
    AWS_ACCESS_KEY_ID,
    AWS_SECRET_ACCESS_KEY,
    APPLICATION_NAME,
    APPLICATION_VERSION,
    $config);

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
 * sample for List Order Items By Next Token Action
 ***********************************************************************/
// @TODO: set request. Action can be passed as  Model\MWSOrdersModelListOrderItemsByNextToken
$request = new  Model\MWSOrdersModelListOrderItemsByNextTokenRequest();
$request->setSellerId(MERCHANT_ID);
// object or array of parameters
invokeListOrderItemsByNextToken($service, $request);

