<?php

namespace MWSService;

use MWSService\Orders\Base\MWSClient;
use MWSService\Orders\Base\MWSMock;

Abstract Class OrdersCommon
{

    /************************************************************************
     * Instantiate Implementation of MarketplaceWebServiceOrders
     *
     * AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY constants
     * are defined in the .config.inc.php located in the same
     * directory as this sample
     ***********************************************************************/
    // More endpoints are listed in the MWS Developer Guide
    // North America:
//    const serviceUrl = "https://mws.amazonservices.com/Orders/2013-09-01";
    // Europe
    const serviceUrl = "https://mws-eu.amazonservices.com/Orders/2013-09-01";
    // Japan
//    const serviceUrl = "https://mws.amazonservices.jp/Orders/2013-09-01";
    // China
//    const serviceUrl = "https://mws.amazonservices.com.cn/Orders/2013-09-01";

    public static $config = [
        'ServiceURL' => self::serviceUrl,
        'ProxyHost' => null,
        'ProxyPort' => -1,
        'ProxyUsername' => null,
        'ProxyPassword' => null,
        'MaxErrorRetry' => 3,
    ];

    /**
     * @return MWSClient
     */
    public static function GetMWSOrdersClient()
    {
        $service = new MWSClient(
            MWSDefine::AWS_ACCESS_KEY_ID,
            MWSDefine::AWS_SECRET_ACCESS_KEY,
            MWSDefine::APPLICATION_NAME,
            MWSDefine::APPLICATION_VERSION,
            self::$config);
        return $service;
    }

    public static function GetMockMWSClient()
    {
        $service = new MWSMock();
        return $service;
    }

}