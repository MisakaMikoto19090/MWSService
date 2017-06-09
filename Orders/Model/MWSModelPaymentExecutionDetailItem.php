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
 * @see MWSModel
 */

namespace MWSService\Orders\Model;

use MWSService\Orders\Base\MWSModel;


/**
 * MWSModelPaymentExecutionDetailItem
 *
 * Properties:
 * <ul>
 *
 * <li>Payment: MWSModelMoney</li>
 * <li>PaymentMethod: string</li>
 *
 * </ul>
 */
class MWSModelPaymentExecutionDetailItem extends MWSModel
{

    public function __construct($data = null)
    {
        $this->_fields = array(
            'Payment' => array('FieldValue' => null, 'FieldType' => 'MWSService\Orders\Model\MWSModelMoney'),
            'PaymentMethod' => array('FieldValue' => null, 'FieldType' => 'string'),
        );
        parent::__construct($data);
    }

    /**
     * Get the value of the Payment property.
     *
     * @return Money Payment.
     */
    public function getPayment()
    {
        return $this->_fields['Payment']['FieldValue'];
    }

    /**
     * Set the value of the Payment property.
     *
     * @param MWSModelMoney payment
     * @return this instance
     */
    public function setPayment($value)
    {
        $this->_fields['Payment']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if Payment is set.
     *
     * @return true if Payment is set.
     */
    public function isSetPayment()
    {
        return !is_null($this->_fields['Payment']['FieldValue']);
    }

    /**
     * Set the value of Payment, return this.
     *
     * @param payment
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withPayment($value)
    {
        $this->setPayment($value);
        return $this;
    }

    /**
     * Get the value of the PaymentMethod property.
     *
     * @return String PaymentMethod.
     */
    public function getPaymentMethod()
    {
        return $this->_fields['PaymentMethod']['FieldValue'];
    }

    /**
     * Set the value of the PaymentMethod property.
     *
     * @param string paymentMethod
     * @return this instance
     */
    public function setPaymentMethod($value)
    {
        $this->_fields['PaymentMethod']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if PaymentMethod is set.
     *
     * @return true if PaymentMethod is set.
     */
    public function isSetPaymentMethod()
    {
        return !is_null($this->_fields['PaymentMethod']['FieldValue']);
    }

    /**
     * Set the value of PaymentMethod, return this.
     *
     * @param paymentMethod
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withPaymentMethod($value)
    {
        $this->setPaymentMethod($value);
        return $this;
    }

}
