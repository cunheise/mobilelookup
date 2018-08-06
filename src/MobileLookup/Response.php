<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/8/6
 * Time: 13:29
 */

namespace MobileLookup;

/**
 * Class Response
 * @package MobileLookup
 */
class Response
{
    /**
     * @var string $location
     */
    protected $location;

    /**
     * @var string $carrier
     */
    protected $carrier;

    /**
     * Response constructor.
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->location = $options['location'];
        $this->carrier = $options['carrier'];
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

}