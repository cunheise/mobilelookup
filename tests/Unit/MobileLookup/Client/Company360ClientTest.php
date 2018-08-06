<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/8/6
 * Time: 12:04
 */

namespace tests\Unit\MobileLookup\Client;

use MobileLookup\Client\Company360Client;

/**
 * Class Company360ClientTest
 * @package tests\Unit\MobileLookup\Client
 */
class Company360ClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * test client request method
     */
    public function testRequest()
    {
        $client = new Company360Client();
        $response = $client->request('13605177123');
        $this->assertEquals('江苏', $response->getLocation());
        $this->assertEquals('移动', $response->getCarrier());
        $response = $client->request('19915410557');
        $this->assertEquals('四川', $response->getLocation());
        $this->assertEquals('电信', $response->getCarrier());
    }
}
