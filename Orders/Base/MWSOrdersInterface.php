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

namespace MWSService\Orders\Base;

interface  MWSOrdersInterface
{

    /**
     * Get Order
     * This operation takes up to 50 order ids and returns the corresponding orders.
     *
     * @param mixed $request array of parameters for  MWSOrdersModelGetOrder request or  MWSOrdersModelGetOrder object itself
     * @see  MWSOrdersModelGetOrderRequest
     * @return  MWSOrdersModelGetOrderResponse
     *
     * @throws MWSOrdersException
     */
    public function getOrder($request);


    /**
     * Get Service Status
     * Returns the service status of a particular MWS API section. The operation
     *        takes no input.
     *
     * @param mixed $request array of parameters for  MWSOrdersModelGetServiceStatus request or  MWSOrdersModelGetServiceStatus object itself
     * @see  MWSOrdersModelGetServiceStatusRequest
     * @return  MWSOrdersModelGetServiceStatusResponse
     *
     * @throws MWSOrdersException
     */
    public function getServiceStatus($request);


    /**
     * List Order Items
     * This operation can be used to list the items of the order indicated by the
     *         given order id (only a single Amazon order id is allowed).
     *
     * @param mixed $request array of parameters for  MWSOrdersModelListOrderItems request or  MWSOrdersModelListOrderItems object itself
     * @see  MWSOrdersModelListOrderItemsRequest
     * @return  MWSOrdersModelListOrderItemsResponse
     *
     * @throws MWSOrdersException
     */
    public function listOrderItems($request);


    /**
     * List Order Items By Next Token
     * If ListOrderItems cannot return all the order items in one go, it will
     *         provide a nextToken. That nextToken can be used with this operation to
     *         retrive the next batch of items for that order.
     *
     * @param mixed $request array of parameters for  MWSOrdersModelListOrderItemsByNextToken request or  MWSOrdersModelListOrderItemsByNextToken object itself
     * @see  MWSOrdersModelListOrderItemsByNextTokenRequest
     * @return  MWSOrdersModelListOrderItemsByNextTokenResponse
     *
     * @throws MWSOrdersException
     */
    public function listOrderItemsByNextToken($request);


    /**
     * List Orders
     * ListOrders can be used to find orders that meet the specified criteria.
     *
     * @param mixed $request array of parameters for  MWSOrdersModelListOrders request or  MWSOrdersModelListOrders object itself
     * @see  MWSOrdersModelListOrdersRequest
     * @return  MWSOrdersModelListOrdersResponse
     *
     * @throws MWSOrdersException
     */
    public function listOrders($request);


    /**
     * List Orders By Next Token
     * If ListOrders returns a nextToken, thus indicating that there are more orders
     *         than returned that matched the given filter criteria, ListOrdersByNextToken
     *         can be used to retrieve those other orders using that nextToken.
     *
     * @param mixed $request array of parameters for  MWSOrdersModelListOrdersByNextToken request or  MWSOrdersModelListOrdersByNextToken object itself
     * @see  MWSOrdersModelListOrdersByNextTokenRequest
     * @return  MWSOrdersModelListOrdersByNextTokenResponse
     *
     * @throws MWSOrdersException
     */
    public function listOrdersByNextToken($request);

}