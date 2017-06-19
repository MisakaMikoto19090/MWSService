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

namespace MWSService\Orders\Samples;

use DOMDocument;
use MWSService\MWSDefine;
use MWSService\Orders\Base\MWSOrdersException;
use MWSService\Orders\Base\MWSOrdersInterface;
use MWSService\Orders\Model\MWSOrdersModelListOrdersRequest;
use MWSService\Orders\OrdersCommon;
use SimpleXMLElement;

Class ListOrdersSample extends OrdersCommon
{

    /**All Order Status
     * @var array
     */
    private static $OrderStatusArr = [
        'PendingAvailability',
        'Pending',
        'Unshipped',
        'PartiallyShipped',
        'Shipped',
        'InvoiceUnconfirmed',
        'Canceled',
        'Unfulfillable',
    ];

    /**All FulfillmentChannel
     * @var array
     */
    private static $FulfillmentChannelArr = [
        'AFN',
        'MFN',
    ];

    /**All Payment Method
     * @var array
     */
    private static $PaymentMethodArr = [
        'COD',
        'CVS',
        'Other',
    ];

    /**
     * @param null $CreatedAfter
     * @param null $CreatedBefore
     * @param null $LastUpdatedAfter
     * @param null $LastUpdatedBefore
     * @param array $OrderStatus
     * @param array $MarketplaceId
     * @param array $FulfillmentChannel
     * @param array $PaymentMethod
     * @param null $BuyerEmail
     * @param null $SellerOrderId
     * @param null $MaxResultsPerPage
     * @param array $TFMShipmentStatus
     * @param int $Flag
     * @return mixed|SimpleXMLElement
     */
    public static function ListOrders(
        $CreatedAfter = null,
        $CreatedBefore = 0,
        $LastUpdatedAfter = null,
        $LastUpdatedBefore = 0,
        array $OrderStatus = [],
        array $MarketplaceId = [],
        array $FulfillmentChannel = [],
        array $PaymentMethod = [],
        $BuyerEmail = null,
        $SellerOrderId = null,
        $MaxResultsPerPage = null,
        array $TFMShipmentStatus = [],
        $Flag = 1
    )
    {
        $service = parent::GetMWSOrdersClient();
        $request = new MWSOrdersModelListOrdersRequest();
        $request = self::SetRequestParams(
            $request,
            $CreatedAfter,
            $CreatedBefore,
            $LastUpdatedAfter,
            $LastUpdatedBefore,
            $OrderStatus,
            $MarketplaceId,
            $FulfillmentChannel,
            $PaymentMethod,
            $BuyerEmail,
            $SellerOrderId,
            $MaxResultsPerPage,
            $TFMShipmentStatus
        );
        return self::invokeListOrders($service, $request, $Flag);
    }

    /**
     * @param MWSOrdersInterface $service
     * @param $request
     * @param $Flag
     * @return mixed|SimpleXMLElement
     */
    private
    static function invokeListOrders(MWSOrdersInterface $service, $request, $Flag)
    {
        try {
            $response = $service->ListOrders($request);
            $dom = new DOMDocument();
            $dom->loadXML($response->toXML());
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;
            $xml = $dom->saveXML();//get xml string
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

    /**
     * @param $request
     * @param $CreatedAfter
     * @param $CreatedBefore
     * @param $LastUpdatedAfter
     * @param $LastUpdatedBefore
     * @param $OrderStatus
     * @param $MarketplaceId
     * @param $FulfillmentChannel
     * @param $PaymentMethod
     * @param $BuyerEmail
     * @param $SellerOrderId
     * @param $MaxResultsPerPage
     * @param $TFMShipmentStatus
     * @return mixed
     */
    private static function SetRequestParams(
        $request,
        $CreatedAfter,
        $CreatedBefore,
        $LastUpdatedAfter,
        $LastUpdatedBefore,
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
        try {
            if ($CreatedAfter) {
                //if CreatedAfter is set,convert to ISO8601
                $CreatedAfter = self::ConvertToISO8601($CreatedAfter);
                $CreatedAfterTimeStamp = strtotime($CreatedAfter);
            } else if (!$LastUpdatedAfter) {
                //if LastUpdatedAfter is not defined and CreatedAfter is not set,set CreatedAfter
                $lastMonth = date('m', time()) - 1;
                $year = date('Y', time());
                if (0 == $lastMonth) {
                    $lastMonth = 12;
                    $year -= 1;
                }
                $CreatedAfter = self::ConvertToISO8601($year . '-' . $lastMonth . '-' . '01');
                $CreatedAfterTimeStamp = strtotime($CreatedAfter);
            }
            if ($CreatedBefore) {
                //CreatedBefore is set
                if (!$CreatedAfter) {
                    throw new MWSOrdersException(['Message' => 'When CreatedBefore Is Set,CreatedAfter Must Be Set']);
                }
                $CreatedBefore = self::ConvertToISO8601($CreatedBefore);
                $CreatedBeforeTimeStamp = strtotime($CreatedBefore);
                if ($CreatedBeforeTimeStamp <= $CreatedAfterTimeStamp) {
                    throw new MWSOrdersException(['Message' => 'CreatedBefore Must Be Greater Than CreatedAfter']);
                }
            } else if ($CreatedAfter != 0) {
                //if  CreatedAfter is defined,set CreatedBefore
                $year = date('Y', time());
                $lastMonth = date('m', time()) - 1;
                if (0 == $lastMonth) {
                    $lastMonth = 12;
                    $year -= 1;
                }
                $lastDay = date('t', strtotime($year . '-' . $lastMonth . '-01 00:00:00'));
                $CreatedBefore = self::ConvertToISO8601($year . '-' . $lastMonth . '-' . $lastDay . ' 23:59:59');
                $CreatedBeforeTimeStamp = strtotime($CreatedBefore);
                if ($CreatedBeforeTimeStamp <= $CreatedAfterTimeStamp) {
                    throw new MWSOrdersException(['Message' => 'CreatedBefore Must Be Greater Than CreatedAfter']);
                }
            }
            if ($LastUpdatedAfter) {
                if ($CreatedAfter) {
                    throw new MWSOrdersException(['Message' => 'When CreatedAfter Is Set,LastUpdatedAfter Can`t Be Set']);
                }
                $LastUpdatedAfter = self::ConvertToISO8601($LastUpdatedAfter);
                $LastUpdatedAfterTimeStamp = strtotime($LastUpdatedAfter);
            } else if (!$CreatedAfter) {
                //if CreatedAfter not set ,Set LastUpdatedAfter
                $lastMonth = date('m', time()) - 1;
                $year = date('Y', time());
                if (0 == $lastMonth) {
                    $lastMonth = 12;
                    $year -= 1;
                }
                $LastUpdatedAfter = self::ConvertToISO8601($year . '-' . $lastMonth . '-' . '01');
                $LastUpdatedAfterTimeStamp = strtotime($LastUpdatedAfter);
            }

            if ($LastUpdatedBefore) {
                if (!$LastUpdatedAfter) {
                    throw new MWSOrdersException(['Message' => 'When LastUpdatedBefore Is Set,LastUpdatedAfter Must Be Set']);
                }
                $LastUpdatedBefore = self::ConvertToISO8601($LastUpdatedBefore);
                $LastUpdatedBeforeTimeStamp = strtotime($LastUpdatedBefore);
                if ($LastUpdatedBeforeTimeStamp <= $LastUpdatedAfterTimeStamp) {
                    throw new MWSOrdersException(['Message' => 'LastUpdatedBefore Must Be Greater Than LastUpdatedAfter']);
                }
            } else if (!$CreatedAfter && $LastUpdatedBefore != 0) {
                $year = date('Y', time());
                $lastMonth = date('m', time()) - 1;
                if (0 == $lastMonth) {
                    $lastMonth = 12;
                    $year = date('Y', time()) - 1;
                }
                $month = date('m', time());
                $lastDay = date('t', strtotime($year . '-' . $lastMonth . '-01 00:00:00'));
                $LastUpdatedBefore = $year . '-' . $month . '-' . $lastDay . 'T23:59:59Z';
                $LastUpdatedBeforeTimeStamp = strtotime($LastUpdatedBefore);
                if ($LastUpdatedBeforeTimeStamp <= $LastUpdatedAfterTimeStamp) {
                    throw new MWSOrdersException(['Message' => 'LastUpdatedBefore Must Be Greater Than LastUpdatedAfter']);
                }
            }
            if ($OrderStatus) {
                if (count($OrderStatus)) {
                    foreach ($OrderStatus as $eachOrderStatus) {
                        if (!in_array($eachOrderStatus, self::$OrderStatusArr)) {
                            throw new MWSOrdersException(['Message' => $eachOrderStatus . 'Is Not A Valid OrderStatus']);
                        }
                    }
                    if (in_array("Unshipped", $OrderStatus) && !in_array('PartiallyShipped', $OrderStatus)) {
                        $OrderStatus[] = 'PartiallyShipped';
                    }
                    if (!in_array("Unshipped", $OrderStatus) && in_array('PartiallyShipped', $OrderStatus)) {
                        $OrderStatus[] = 'Unshipped';
                    }
                } else {
                    $OrderStatus = self::$OrderStatusArr;
                }
            } else {
                $OrderStatus = self::$OrderStatusArr;
            }
            if ($MarketplaceId) {
                if (count($MarketplaceId)) {
                    foreach ($MarketplaceId as $eachMarketplaceId) {
                        if (!in_array($eachMarketplaceId, MWSDefine::MWS_MARKETPLACE_ID_DEFINE)) {
                            throw new MWSOrdersException(['Message' => $eachMarketplaceId . 'Is Not A Valid MarketplaceId']);
                        }
                    }
                } else {
                    $MarketplaceId = [MWSDefine::MARKETPLACE_ID];
                }
            } else {
                $MarketplaceId = [MWSDefine::MARKETPLACE_ID];
            }
            if ($FulfillmentChannel) {
                if (count($FulfillmentChannel)) {
                    foreach ($FulfillmentChannel as $eachFulfillmentChannel) {
                        if (!in_array($eachFulfillmentChannel, self::$FulfillmentChannelArr)) {
                            throw new MWSOrdersException(['Message' => $eachFulfillmentChannel . 'Is Not A Valid FulfillmentChannel']);
                        }
                    }
                } else {
                    $FulfillmentChannel = self::$FulfillmentChannelArr;
                }
            } else {
                $FulfillmentChannel = self::$FulfillmentChannelArr;
            }
            if ($PaymentMethod) {
                if (count($PaymentMethod)) {
                    foreach ($PaymentMethod as $eachPaymentMethod) {
                        if (!in_array($eachPaymentMethod, self::$PaymentMethodArr)) {
                            throw new MWSOrdersException(['Message' => $eachPaymentMethod . 'Is Not A Valid PaymentMethod,P.S. COD,CVS Is Only Available In Japan']);
                        }
                    }
                } else {
                    $PaymentMethod = self::$PaymentMethodArr;
                }
            } else {
                $PaymentMethod = self::$PaymentMethodArr;
            }
            if ($BuyerEmail) {
                $BuyerEmail = filter_var($BuyerEmail, FILTER_VALIDATE_EMAIL);
                $FulfillmentChannel = [];
                $OrderStatus = [];
                $PaymentMethod = [];
                $LastUpdatedAfter = null;
                $LastUpdatedBefore = null;
                $SellerOrderId = null;
            }
            if ($SellerOrderId) {
                $FulfillmentChannel = [];
                $OrderStatus = [];
                $PaymentMethod = [];
                $LastUpdatedAfter = null;
                $LastUpdatedBefore = null;
                $BuyerEmail = null;
            }
            if ($MaxResultsPerPage) {
                $MaxResultsPerPage = abs(intval($MaxResultsPerPage));
                if ($MaxResultsPerPage < 1 || $MaxResultsPerPage > 100) {
                    throw new MWSOrdersException(['Message' => 'MaxResultsPerPage Must Between 1 and 100']);
                }
            } else {
                $MaxResultsPerPage = 100;
            }
            if ($TFMShipmentStatus) {
                foreach ($TFMShipmentStatus as $eachTFMShipmentStatus) {
                    if (!in_array($eachTFMShipmentStatus, $TFMShipmentStatus)) {
                        throw new MWSOrdersException(['Message' => $eachTFMShipmentStatus . 'Is Not A Valid TFMShipmentStatus,Besides TFMShipmentStatus Is Only Available In China']);
                    }
                }
            }
            $request->setSellerId(MWSDefine::MERCHANT_ID);
            if ($CreatedAfter) {
                $request->setCreatedAfter($CreatedAfter);
            }
            if ($CreatedBefore) {
                $request->setCreatedBefore($CreatedBefore);
            }
            if ($LastUpdatedAfter) {
                $request->setLastUpdatedAfter($LastUpdatedAfter);
            }
            if ($LastUpdatedBefore) {
                $request->setLastUpdatedBefore($LastUpdatedBefore);
            }
            if ($OrderStatus) {
                $request->setOrderStatus($OrderStatus);
            }
            if ($MarketplaceId) {
                $request->setMarketplaceId($MarketplaceId);
            }
            if ($FulfillmentChannel) {
                $request->setFulfillmentChannel($FulfillmentChannel);
            }
            if ($PaymentMethod) {
                $request->setPaymentMethod($PaymentMethod);
            }
            if ($BuyerEmail) {
                $request->setBuyerEmail($BuyerEmail);
            }
            if ($SellerOrderId) {
                $request->setSellerId($SellerOrderId);
            }
            if ($MaxResultsPerPage) {
                $request->isSetMaxResultsPerPage($MaxResultsPerPage);
            }
            if ($TFMShipmentStatus) {
                $request->setTFMShipmentStatus($TFMShipmentStatus);
            }
            return $request;
        } catch (MWSOrdersException $ex) {
            echo("Caught Exception: " . $ex->getMessage() . "\n");
        }
    }

    /**
     * @param $time
     * @return false|string
     * @throws MWSOrdersException
     */
    private
    static function ConvertToISO8601($time)
    {
        if (is_int($time)) {//timestamp
            if ($time > (time() - 120)) {
                throw new MWSOrdersException(['Message' => 'Timestamp Must Not Be Greater Than 2 Minutes Less From Now']);
            }
        } else {
            $time = strtotime($time);
            if (!is_int($time)) {
                throw new MWSOrdersException(['Message' => 'This String Can`t Covert To Timestamp']);
            }
        }
        return gmdate("Y-m-d\TH:i:s.\\0\\0\\0\\Z", $time);
    }
}





