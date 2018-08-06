<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/8/6
 * Time: 15:54
 */

namespace Tests\Unit\MobileLookup;

use Exception;
use MobileLookup\Client\TaobaoClient;
use MobileLookup\Exception\InvalidNumberException;
use MobileLookup\MobileLookupService;

/**
 * Class MobileLookupServiceTest
 * @package Tests\Unit\MobileLookup
 */
class MobileLookupServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * test get carrier from service
     */
    public function testGetCarrier()
    {
        $mobileLookupService = new MobileLookupService(new TaobaoClient());
        $this->assertEquals('移动', $mobileLookupService->getCarrier('13605177123'));
    }

    /**
     * test get location from service
     */
    public function testGetLocation()
    {
        $mobileLookupService = new MobileLookupService(new TaobaoClient());
        $this->assertEquals('江苏', $mobileLookupService->getLocation('13605177123'));
    }

    /**
     * test invalid phone number
     */
    public function testInvalidNumber()
    {
        $mobileLookupService = new MobileLookupService(new TaobaoClient());
        $invalidNumbers = ['123', '01360517712', 'abs13605177'];
        foreach ($invalidNumbers as $invalidNumber) {
            try {
                $mobileLookupService->getLocation($invalidNumber);
            } catch (Exception $exception) {
                $this->assertEquals(get_class($exception), InvalidNumberException::class);
            }
        }
    }
}
