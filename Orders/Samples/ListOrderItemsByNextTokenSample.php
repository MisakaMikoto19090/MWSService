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
    public static function ListOrderItemsByNextTokenSample($NextToken = null, $Flag = 1)
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
        try {
            $request->setSellerId(MWSDefine::MERCHANT_ID);
            if ($NextToken) {
                $request->setNextToken($NextToken);
            } else {
                throw new MWSOrdersException(['Message' => 'NextToken Must Be Set']);
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
