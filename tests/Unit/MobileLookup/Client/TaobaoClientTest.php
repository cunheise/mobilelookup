<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 17:12
 */

namespace Tests\Unit\MobileLookup\Client;

use MobileLookup\Client\TaobaoClient;

class TaobaoClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLocation()
    {
        $client = new TaobaoClient();
        $this->assertEquals('江苏', $client->getLocation('13605177123'));
    }
}
