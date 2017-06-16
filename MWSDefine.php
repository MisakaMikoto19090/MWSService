<?php

namespace MWSService;

Class MWSDefine
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

    const MWS_MARKETPLACE_ID_DEFINE = [
        'A2EUQ1WTGCTBG2',
        'ATVPDKIKX0DER',

        'A1PA6795UKMFR9',
        'A1RKKUPIHCS9HS',
        'A13V1IB3VIYZZH',
        'A21TJRUUN4KGV',
        'APJ6JRA9NG5V4',
        'A1F83G8C2ARO7P',
        'A1VC38T7YXB528',
        'AAHKV2X7AFYLW',
    ];
}

