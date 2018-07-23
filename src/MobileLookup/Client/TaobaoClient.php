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
use MobileLookup\Util;

/**
 * Class TaobaoClient
 * @package MobileLookup\Client
 */
class TaobaoClient extends AbstractClient
{
    /**
     * @param string $number
     * @return string
     * @throws ParseException
     */
    protected function doGetLocation($number)
    {
        $client = new Client();
        $response = $client->get('https://tcc.taobao.com/cc/json/mobile_tel_segment.htm', [
            'query' => ['tel' => $number],
            'headers' => $this->headers,
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException('remote gateway error');
        }
        $content = $response->getBody()->getContents();
        if (!preg_match("/province:'([^']+)'/", $content, $m)) {
            throw new ParseException("'$content' can not be parsed");
        }
        return Util::convertToUtf8($m[1]);
    }

}