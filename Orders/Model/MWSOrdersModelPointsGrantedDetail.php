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
 * MWSOrdersModelPointsGrantedDetail
 *
 * Properties:
 * <ul>
 *
 * <li>PointsNumber: int</li>
 * <li>PointsMonetaryValue: MWSOrdersModelMoney</li>
 *
 * </ul>
 */
class MWSOrdersModelPointsGrantedDetail extends MWSOrdersModel
{

    public function __construct($data = null)
    {
        $this->_fields = array(
            'PointsNumber' => array('FieldValue' => null, 'FieldType' => 'int'),
            'PointsMonetaryValue' => array('FieldValue' => null, 'FieldType' => 'MWSService\Orders\Model\MWSOrdersModelMoney'),
        );
        parent::__construct($data);
    }

    /**
     * Get the value of the PointsNumber property.
     *
     * @return Integer PointsNumber.
     */
    public function getPointsNumber()
    {
        return $this->_fields['PointsNumber']['FieldValue'];
    }

    /**
     * Set the value of the PointsNumber property.
     *
     * @param int pointsNumber
     * @return this instance
     */
    public function setPointsNumber($value)
    {
        $this->_fields['PointsNumber']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if PointsNumber is set.
     *
     * @return true if PointsNumber is set.
     */
    public function isSetPointsNumber()
    {
        return !is_null($this->_fields['PointsNumber']['FieldValue']);
    }

    /**
     * Set the value of PointsNumber, return this.
     *
     * @param pointsNumber
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withPointsNumber($value)
    {
        $this->setPointsNumber($value);
        return $this;
    }

    /**
     * Get the value of the PointsMonetaryValue property.
     *
     * @return Money PointsMonetaryValue.
     */
    public function getPointsMonetaryValue()
    {
        return $this->_fields['PointsMonetaryValue']['FieldValue'];
    }

    /**
     * Set the value of the PointsMonetaryValue property.
     *
     * @param MWSOrdersModelMoney pointsMonetaryValue
     * @return this instance
     */
    public function setPointsMonetaryValue($value)
    {
        $this->_fields['PointsMonetaryValue']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if PointsMonetaryValue is set.
     *
     * @return true if PointsMonetaryValue is set.
     */
    public function isSetPointsMonetaryValue()
    {
        return !is_null($this->_fields['PointsMonetaryValue']['FieldValue']);
    }

    /**
     * Set the value of PointsMonetaryValue, return this.
     *
     * @param pointsMonetaryValue
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withPointsMonetaryValue($value)
    {
        $this->setPointsMonetaryValue($value);
        return $this;
    }

}
