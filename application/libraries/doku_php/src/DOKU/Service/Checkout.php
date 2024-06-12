<?php

namespace DOKU\Service;

use DOKU\Common\PaycodeGeneratorCc;

class 
{
    public static function generated($config, $params)
    {
        $params['targetPath'] = '/checkout/v1/payment';
        return PaycodeGeneratorCc::post($config, $params);
    }
}
