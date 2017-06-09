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
 * MWSModel_ListOrdersResponse
 *
 * Properties:
 * <ul>
 *
 * <li>ListOrdersResult: MWSModel_ListOrdersResult</li>
 * <li>ResponseMetadata: MWSModel_ResponseMetadata</li>
 * <li>ResponseHeaderMetadata: MWSModel_ResponseHeaderMetadata</li>
 *
 * </ul>
 */
class MWSModelListOrdersResponse extends MWSModel
{

    public function __construct($data = null)
    {
        $this->_fields = array(
            'ListOrdersResult' => array('FieldValue' => null, 'FieldType' => 'MWSModel_ListOrdersResult'),
            'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSModel_ResponseMetadata'),
            'ResponseHeaderMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSModel_ResponseHeaderMetadata'),
        );
        parent::__construct($data);
    }

    /**
     * Get the value of the ListOrdersResult property.
     *
     * @return ListOrdersResult ListOrdersResult.
     */
    public function getListOrdersResult()
    {
        return $this->_fields['ListOrdersResult']['FieldValue'];
    }

    /**
     * Set the value of the ListOrdersResult property.
     *
     * @param MWSModel_ListOrdersResult listOrdersResult
     * @return this instance
     */
    public function setListOrdersResult($value)
    {
        $this->_fields['ListOrdersResult']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ListOrdersResult is set.
     *
     * @return true if ListOrdersResult is set.
     */
    public function isSetListOrdersResult()
    {
        return !is_null($this->_fields['ListOrdersResult']['FieldValue']);
    }

    /**
     * Set the value of ListOrdersResult, return this.
     *
     * @param listOrdersResult
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withListOrdersResult($value)
    {
        $this->setListOrdersResult($value);
        return $this;
    }

    /**
     * Get the value of the ResponseMetadata property.
     *
     * @return ResponseMetadata ResponseMetadata.
     */
    public function getResponseMetadata()
    {
        return $this->_fields['ResponseMetadata']['FieldValue'];
    }

    /**
     * Set the value of the ResponseMetadata property.
     *
     * @param MWSModel_ResponseMetadata responseMetadata
     * @return this instance
     */
    public function setResponseMetadata($value)
    {
        $this->_fields['ResponseMetadata']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ResponseMetadata is set.
     *
     * @return true if ResponseMetadata is set.
     */
    public function isSetResponseMetadata()
    {
        return !is_null($this->_fields['ResponseMetadata']['FieldValue']);
    }

    /**
     * Set the value of ResponseMetadata, return this.
     *
     * @param responseMetadata
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withResponseMetadata($value)
    {
        $this->setResponseMetadata($value);
        return $this;
    }

    /**
     * Get the value of the ResponseHeaderMetadata property.
     *
     * @return ResponseHeaderMetadata ResponseHeaderMetadata.
     */
    public function getResponseHeaderMetadata()
    {
        return $this->_fields['ResponseHeaderMetadata']['FieldValue'];
    }

    /**
     * Set the value of the ResponseHeaderMetadata property.
     *
     * @param MWSModel_ResponseHeaderMetadata responseHeaderMetadata
     * @return this instance
     */
    public function setResponseHeaderMetadata($value)
    {
        $this->_fields['ResponseHeaderMetadata']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ResponseHeaderMetadata is set.
     *
     * @return true if ResponseHeaderMetadata is set.
     */
    public function isSetResponseHeaderMetadata()
    {
        return !is_null($this->_fields['ResponseHeaderMetadata']['FieldValue']);
    }

    /**
     * Set the value of ResponseHeaderMetadata, return this.
     *
     * @param responseHeaderMetadata
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withResponseHeaderMetadata($value)
    {
        $this->setResponseHeaderMetadata($value);
        return $this;
    }

    /**
     * Construct MWSModel_ListOrdersResponse from XML string
     *
     * @param $xml
     *        XML string to construct from
     *
     * @return MWSModel_ListOrdersResponse
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
        $response = $xpath->query("//*[local-name()='ListOrdersResponse']");
        if ($response->length == 1) {
            return new MWSModel_ListOrdersResponse(($response->item(0)));
        } else {
            throw new Exception ("Unable to construct MWSModel_ListOrdersResponse from provided XML. 
                                  Make sure that ListOrdersResponse is a root element");
        }
    }

    /**
     * XML Representation for this object
     *
     * @return string XML for this object
     */
    public function toXML()
    {
        $xml = "";
        $xml .= "<ListOrdersResponse xmlns=\"https://mws.amazonservices.com/Orders/2013-09-01\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListOrdersResponse>";
        return $xml;
    }

}
