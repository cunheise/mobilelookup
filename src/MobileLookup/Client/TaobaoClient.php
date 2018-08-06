<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 16:22
 */

namespace MobileLookup\Client;


use GuzzleHttp\Client;
use MobileLookup\Exception\ParseException;

/**
 * Class TaobaoClient
 * @package MobileLookup\Client
 */
class TaobaoClient extends AbstractClient
{
    /**
     * @param string $number
     * @return string
     */
    protected function doRequest($number)
    {
        $client = new Client();
        $response = $client->get('https://tcc.taobao.com/cc/json/mobile_tel_segment.htm', [
            'query' => [
                'tel' => $number
            ],
            'headers' => $this->headers,
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException("remote gateway error");
        }
        return $response->getBody()->getContents();

    }

    /**
     * @param string $response
     * @return array
     * @throws ParseException
     */
    protected function parse($response)
    {
        $converter = function ($s) {
            return iconv('GB18030', "UTF-8//IGNORE", $s);
        };
        if (!preg_match("/province:'([^']+)'/", $response, $m)) {
            throw new ParseException("can not get province from '$response'");
        }
        $location = $converter($m[1]);
        if (!preg_match("/catName:'([^']+)'/", $response, $m)) {
            throw new ParseException("can not get province from '$response'");
        }
        $carrier = str_replace('中国', '', $converter($m[1]));
        return ['location' => $location, 'carrier' => $carrier];
    }

}