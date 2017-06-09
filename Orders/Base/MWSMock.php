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
 *  @see MWSInterface
 */
namespace MWSService\Orders\Base;

class MWSMock implements MWSInterface
{
    // Public API ------------------------------------------------------------//

    /**
     * Get Order
     * This operation takes up to 50 order ids and returns the corresponding orders.
     *
     * @param mixed $request array of parameters for MWSModel_GetOrder request or MWSModel_GetOrder object itself
     * @see MWSModel_GetOrder
     * @return MWSModel_GetOrderResponse
     *
     * @throws MWSException
     */
    public function getOrder($request)
    {
        require_once(dirname(__FILE__) . '/Model/GetOrderResponse.php');
        return MWSModel_GetOrderResponse::fromXML($this->_invoke('GetOrder'));
    }

    /**
     * Get Service Status
     * Returns the service status of a particular MWS API section. The operation
     * 		takes no input.
     *
     * @param mixed $request array of parameters for MWSModel_GetServiceStatus request or MWSModel_GetServiceStatus object itself
     * @see MWSModel_GetServiceStatus
     * @return MWSModel_GetServiceStatusResponse
     *
     * @throws MWSException
     */
    public function getServiceStatus($request)
    {
        require_once(dirname(__FILE__) . '/Model/GetServiceStatusResponse.php');
        return MWSModel_GetServiceStatusResponse::fromXML($this->_invoke('GetServiceStatus'));
    }

    /**
     * List Order Items
     * This operation can be used to list the items of the order indicated by the
     *         given order id (only a single Amazon order id is allowed).
     *
     * @param mixed $request array of parameters for MWSModel_ListOrderItems request or MWSModel_ListOrderItems object itself
     * @see MWSModel_ListOrderItems
     * @return MWSModel_ListOrderItemsResponse
     *
     * @throws MWSException
     */
    public function listOrderItems($request)
    {
        require_once(dirname(__FILE__) . '/Model/ListOrderItemsResponse.php');
        return MWSModel_ListOrderItemsResponse::fromXML($this->_invoke('ListOrderItems'));
    }

    /**
     * List Order Items By Next Token
     * If ListOrderItems cannot return all the order items in one go, it will
     *         provide a nextToken. That nextToken can be used with this operation to
     *         retrive the next batch of items for that order.
     *
     * @param mixed $request array of parameters for MWSModel_ListOrderItemsByNextToken request or MWSModel_ListOrderItemsByNextToken object itself
     * @see MWSModel_ListOrderItemsByNextToken
     * @return MWSModel_ListOrderItemsByNextTokenResponse
     *
     * @throws MWSException
     */
    public function listOrderItemsByNextToken($request)
    {
        require_once(dirname(__FILE__) . '/Model/ListOrderItemsByNextTokenResponse.php');
        return MWSModel_ListOrderItemsByNextTokenResponse::fromXML($this->_invoke('ListOrderItemsByNextToken'));
    }

    /**
     * List Orders
     * ListOrders can be used to find orders that meet the specified criteria.
     *
     * @param mixed $request array of parameters for MWSModel_ListOrders request or MWSModel_ListOrders object itself
     * @see MWSModel_ListOrders
     * @return MWSModel_ListOrdersResponse
     *
     * @throws MWSException
     */
    public function listOrders($request)
    {
        require_once(dirname(__FILE__) . '/Model/ListOrdersResponse.php');
        return MWSModel_ListOrdersResponse::fromXML($this->_invoke('ListOrders'));
    }

    /**
     * List Orders By Next Token
     * If ListOrders returns a nextToken, thus indicating that there are more orders
     *         than returned that matched the given filter criteria, ListOrdersByNextToken
     *         can be used to retrieve those other orders using that nextToken.
     *
     * @param mixed $request array of parameters for MWSModel_ListOrdersByNextToken request or MWSModel_ListOrdersByNextToken object itself
     * @see MWSModel_ListOrdersByNextToken
     * @return MWSModel_ListOrdersByNextTokenResponse
     *
     * @throws MWSException
     */
    public function listOrdersByNextToken($request)
    {
        require_once(dirname(__FILE__) . '/Model/ListOrdersByNextTokenResponse.php');
        return MWSModel_ListOrdersByNextTokenResponse::fromXML($this->_invoke('ListOrdersByNextToken'));
    }

    // Private API ------------------------------------------------------------//

    private function _invoke($actionName)
    {
        return $xml = file_get_contents(dirname(__FILE__) . '/Mock/' . $actionName . 'Response.xml', /** search include path */ TRUE);
    }

}
