<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:39
 */

namespace MobileLookup;


use MobileLookup\Client\ClientInterface;
use MobileLookup\Exception\InvalidNumberException;

/**
 * Class MobileLookupService
 * @package MobileLookup
 */
class MobileLookupService
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * MobileLookupService constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * @param ClientInterface $client
     * @return MobileLookupService
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @param string $number
     * @return string
     */
    public function getLocation($number)
    {
        if (!is_numeric($number) || strlen($number) != 11) {
            throw new InvalidNumberException("'$number' is invalid");
        }
        return $this->client->getLocation($number);
    }

}