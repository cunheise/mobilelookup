<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/8/6
 * Time: 12:04
 */

namespace tests\Unit\MobileLookup\Client;

use MobileLookup\Client\Company360Client;

class Company360ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testGetLocation()
    {
        $client = new Company360Client();
        $this->assertEquals('江苏', $client->getLocation('13605177123'));
        $this->assertEquals('四川', $client->getLocation('19915410557'));
    }
}
