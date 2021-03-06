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
 * @see MWSOrdersModel
 */

namespace MWSService\Orders\Model;

use MWSService\Orders\Base\MWSOrdersModel;


/**
 * MWSOrdersModelBuyerCustomizedInfoDetail
 *
 * Properties:
 * <ul>
 *
 * <li>CustomizedURL: string</li>
 *
 * </ul>
 */
class MWSOrdersModelBuyerCustomizedInfoDetail extends MWSOrdersModel
{

    public function __construct($data = null)
    {
        $this->_fields = array(
            'CustomizedURL' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

    /**
     * Get the value of the CustomizedURL property.
     *
     * @return String CustomizedURL.
     */
    public function getCustomizedURL()
    {
        return $this->_fields['CustomizedURL']['FieldValue'];
    }

    /**
     * Set the value of the CustomizedURL property.
     *
     * @param string customizedURL
     * @return this instance
     */
    public function setCustomizedURL($value)
    {
        $this->_fields['CustomizedURL']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if CustomizedURL is set.
     *
     * @return true if CustomizedURL is set.
     */
    public function isSetCustomizedURL()
    {
        return !is_null($this->_fields['CustomizedURL']['FieldValue']);
    }

    /**
     * Set the value of CustomizedURL, return this.
     *
     * @param customizedURL
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withCustomizedURL($value)
    {
        $this->setCustomizedURL($value);
        return $this;
    }

}
