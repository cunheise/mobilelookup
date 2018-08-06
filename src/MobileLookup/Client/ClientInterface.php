<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:44
 */

namespace MobileLookup\Client;

use MobileLookup\Response;

/**
 * Interface ClientInterface
 * @package MobileLookup\Client
 */
interface ClientInterface
{
    /**
     * @param string $number
     * @return Response
     */
    public function request($number);

}