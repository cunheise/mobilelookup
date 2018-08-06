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
     * @var Response $response
     */
    protected $response;

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
        return $this->getResponse($number)->getLocation();
    }

    /**
     * @param string $number
     * @return string
     */
    public function getCarrier($number)
    {
        return $this->getResponse($number)->getCarrier();
    }

    /**
     * @param string $number
     * @return Response
     * @throws InvalidNumberException
     */
    protected function getResponse($number)
    {
        $this->validate($number);
        if ($this->response == null) {
            $this->response = $this->client->request($number);
        }
        return $this->response;
    }

    /**
     * @param string $number
     * @throws InvalidNumberException
     */
    protected function validate($number)
    {
        if (!is_string($number) || !is_numeric($number) || strlen($number) != 11 || $number[0] != 1) {
            throw new InvalidNumberException("'$number' is invalid");
        }
    }

}