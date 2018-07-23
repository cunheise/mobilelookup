<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 17:16
 */

namespace Tests\Unit\MobileLookup\Client;

use MobileLookup\Client\BaifubaoClient;

class BaifubaoClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLocation()
    {
        $client = new BaifubaoClient();
        $this->assertEquals('江苏', $client->getLocation('13605177123'));
    }
}
