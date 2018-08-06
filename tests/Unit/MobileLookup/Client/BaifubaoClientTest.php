<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 17:16
 */

namespace Tests\Unit\MobileLookup\Client;

use MobileLookup\Client\BaifubaoClient;

/**
 * Class BaifubaoClientTest
 * @package Tests\Unit\MobileLookup\Client
 */
class BaifubaoClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * test client request method
     */
    public function testRequest()
    {
        $client = new BaifubaoClient();
        $response = $client->request('13605177123');
        $this->assertEquals('江苏', $response->getLocation());
        $this->assertEquals('移动', $response->getCarrier());
//        $response = $client->request('19915410557');
//        $this->assertEquals('四川', $response->getLocation());
//        $this->assertEquals('电信', $response->getCarrier());
    }
}
