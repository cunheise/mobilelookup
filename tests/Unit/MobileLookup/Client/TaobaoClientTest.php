<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 17:12
 */

namespace Tests\Unit\MobileLookup\Client;

use MobileLookup\Client\TaobaoClient;

/**
 * Class TaobaoClientTest
 * @package Tests\Unit\MobileLookup\Client
 */
class TaobaoClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * test client request method
     */
    public function testReqest()
    {
        $client = new TaobaoClient();
        $response = $client->request('13605177123');
        $this->assertEquals('江苏', $response->getLocation());
        $this->assertEquals('移动', $response->getCarrier());
        $response = $client->request('19915410557');
        $this->assertEquals('四川', $response->getLocation());
        $this->assertEquals('电信', $response->getCarrier());
    }
}
