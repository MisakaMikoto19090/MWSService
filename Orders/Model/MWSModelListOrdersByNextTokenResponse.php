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
use DOMDocument;


/**
 * MWSModelListOrdersByNextTokenResponse
 *
 * Properties:
 * <ul>
 *
 * <li>ListOrdersByNextTokenResult: MWSModelListOrdersByNextTokenResult</li>
 * <li>ResponseMetadata: MWSModelResponseMetadata</li>
 * <li>ResponseHeaderMetadata: MWSModelResponseHeaderMetadata</li>
 *
 * </ul>
 */
class  MWSModelListOrdersByNextTokenResponse extends MWSModel
{

    public function __construct($data = null)
    {
        $this->_fields = array(
            'ListOrdersByNextTokenResult' => array('FieldValue' => null, 'FieldType' => 'MWSService\Orders\Model\MWSModelListOrdersByNextTokenResult'),
            'ResponseMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSService\Orders\Model\MWSModelResponseMetadata'),
            'ResponseHeaderMetadata' => array('FieldValue' => null, 'FieldType' => 'MWSService\Orders\Model\MWSModelResponseHeaderMetadata'),
        );
        parent::__construct($data);
    }

    /**
     * Get the value of the ListOrdersByNextTokenResult property.
     *
     * @return ListOrdersByNextTokenResult ListOrdersByNextTokenResult.
     */
    public function getListOrdersByNextTokenResult()
    {
        return $this->_fields['ListOrdersByNextTokenResult']['FieldValue'];
    }

    /**
     * Set the value of the ListOrdersByNextTokenResult property.
     *
     * @param MWSModelListOrdersByNextTokenResult listOrdersByNextTokenResult
     * @return this instance
     */
    public function setListOrdersByNextTokenResult($value)
    {
        $this->_fields['ListOrdersByNextTokenResult']['FieldValue'] = $value;
        return $this;
    }

    /**
     * Check to see if ListOrdersByNextTokenResult is set.
     *
     * @return true if ListOrdersByNextTokenResult is set.
     */
    public function isSetListOrdersByNextTokenResult()
    {
        return !is_null($this->_fields['ListOrdersByNextTokenResult']['FieldValue']);
    }

    /**
     * Set the value of ListOrdersByNextTokenResult, return this.
     *
     * @param listOrdersByNextTokenResult
     *             The new value to set.
     *
     * @return This instance.
     */
    public function withListOrdersByNextTokenResult($value)
    {
        $this->setListOrdersByNextTokenResult($value);
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
     * @param MWSModelResponseMetadata responseMetadata
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
     * @param MWSModelResponseHeaderMetadata responseHeaderMetadata
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
     * Construct MWSModelListOrdersByNextTokenResponse from XML string
     *
     * @param $xml
     *        XML string to construct from
     *
     * @return MWSModelListOrdersByNextTokenResponse
     */
    public static function fromXML($xml)
    {
        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $xpath = new DOMXPath($dom);
        $response = $xpath->query("//*[local-name()='ListOrdersByNextTokenResponse']");
        if ($response->length == 1) {
            return new MWSModelListOrdersByNextTokenResponse(($response->item(0)));
        } else {
            throw new Exception ("Unable to construct MWSModelListOrdersByNextTokenResponse from provided XML. 
                                  Make sure that ListOrdersByNextTokenResponse is a root element");
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
        $xml .= "<ListOrdersByNextTokenResponse xmlns=\"https://mws.amazonservices.com/Orders/2013-09-01\">";
        $xml .= $this->_toXMLFragment();
        $xml .= "</ListOrdersByNextTokenResponse>";
        return $xml;
    }

}
