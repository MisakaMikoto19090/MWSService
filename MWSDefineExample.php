<?php

namespace MWSService;

Class MWSDefineExample
{
    /************************************************************************
     * REQUIRED
     *
     * Access Key ID and Secret Acess Key ID, obtained from:
     * http://aws.amazon.com
     ***********************************************************************/
    const AWS_ACCESS_KEY_ID = '<Your Access Key ID>';
    const AWS_SECRET_ACCESS_KEY = '<Your Secret Key>';

    /************************************************************************
     * REQUIRED
     *
     * All MWS requests must contain a User-Agent header. The application
     * name and version defined below are used in creating this value.
     ***********************************************************************/
    const APPLICATION_NAME = '<Your Application Name>';
    const APPLICATION_VERSION = '<Your Application Version or Build Number>';

    /************************************************************************
     * REQUIRED
     *
     * All MWS requests must contain the seller's merchant ID and
     * marketplace ID.
     ***********************************************************************/
    const MERCHANT_ID = '<Your Merchant Id>';
    const MARKETPLACE_ID = '<Your Marketplace Id>';
}

