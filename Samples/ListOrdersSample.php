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
 * List Orders Sample
 */

namespace MWSService\Samples;

use DOMDocument;
use MWSService\Orders\Base\MWSClient;
use MWSService\Orders\Base\MWSException;
use MWSService\Orders\Base\MWSInterface;
use MWSService\Orders\Model;
use MWSService\OrdersCommon;
use SimpleXMLElement;

Class ListOrdersSample extends OrdersCommon
{
    private static $OrderStatusArr = [
        0 => 'PendingAvailability',
        1 => 'Pending',
        2 => 'Unshipped',
        3 => 'PartiallyShipped',
        4 => 'Shipped',
        5 => 'InvoiceUnconfirmed',
        6 => 'Canceled',
        7 => 'Unfulfillable',
    ];
    public static $FulfillmentChannelArr = [
        0 => 'AFN',
        1 => 'MFN',
    ];
    public static $PaymentMethodArr = [
        0 => 'COD',
        1 => 'CVS',
        2 => 'Other',
    ];
    public static $TFMShipmentStatus = [
        0 => 'PendingPickUp',
        1 => 'LabelCanceled',
        2 => 'PickedUp',
        3 => 'AtDestinationFC',
        4 => 'Delivered',
        5 => 'RejectedByBuyer',
        6 => 'Undeliverable',
        7 => 'ReturnedToSeller',
        8 => 'Lost',
    ];

    public static function ListOrders(
        $CreatedAfter,
        $CreatedBefore,
        $LastUpdateAfter,
        $LastUpdateBefore,
        $OrderStatus,
        $MarketplaceId,
        $FulfillmentChannel,
        $PaymentMethod,
        $BuyerEmail,
        $SellerOrderId,
        $MaxResultsPerPage,
        $TFMShipmentStatus
    )
    {
        $service = new MWSClient(
            MWSDefine::AWS_ACCESS_KEY_ID,
            MWSDefine::AWS_SECRET_ACCESS_KEY,
            MWSDefine::APPLICATION_NAME,
            MWSDefine::APPLICATION_VERSION,
            self::$config);

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
         * sample for List Orders Action
         ***********************************************************************/
// @TODO: set request. Action can be passed as  Model\MWSModelListOrders
        $request = new  Model\MWSModelListOrdersRequest();
        $request->setSellerId(MWSDefine::MERCHANT_ID);
        $request->setMarketplaceId(MWSDefine::MARKETPLACE_ID);
        $date = date('yyyy-MM-01', time());
        $time = '00:00:00';
        $final_date = $date . 'T' . $time . 'Z';
        $request->setCreatedAfter($final_date);//Format:   2017-06-01T00:00:00Z

        $request->setOrderStatus('Shipped');
        self::invokeListOrders($service, $request);


    }

    /**
     * Get List Orders Action Sample
     * Gets competitive pricing and related information for a product identified by
     * the MarketplaceId and ASIN.
     *
     * @param MWSInterface $service instance of MWSInterface
     * @param mixed $request Model\MWSModelListOrders or array of parameters
     */
    public
    static function invokeListOrders(MWSInterface $service, $request)
    {
        try {
            $response = $service->ListOrders($request);
//            echo("Service Response\n");
//            echo("=============================================================================\n");
            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
//            echo $dom->saveXML();
//            echo("ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
            $xml = $dom->saveXML();//get xml string
            $orderData = new SimpleXMLElement($xml);//convert to xml object
            $array = json_encode($orderData, true);
            $result = json_decode($array, true);//convert to array

            return $result;
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
}





