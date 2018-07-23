<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:44
 */

namespace MobileLookup\Client;

/**
 * Interface ClientInterface
 * @package MobileLookup\Client
 */
interface ClientInterface
{
    /**
     * @param string $number
     * @return string
     */
    public function getLocation($number);
}