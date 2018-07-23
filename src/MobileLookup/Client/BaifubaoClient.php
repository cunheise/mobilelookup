<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:43
 */

namespace MobileLookup\Client;


use GuzzleHttp\Client;
use MobileLookup\Exception\RemoteGatewayException;

/**
 * Class BaifubaoClient
 * @package MobileLookup\Client
 */
class BaifubaoClient extends AbstractClient
{
    /**
     * @param string $number
     * @return string
     * @throws RemoteGatewayException
     */
    protected function doGetLocation($number)
    {
        $client = new Client();
        $response = $client->get('https://www.baifubao.com/callback', [
            'query' => [
                'cmd' => 1059,
                'callback' => 'phone',
                'phone' => $number,
            ],
            'headers' => $this->headers
        ]);
        if ($response->getStatusCode() != 200) {
            throw new RemoteGatewayException('remote gateway error');
        }
        $data = json_decode(trim(preg_replace('/^phone/', '',
            preg_replace('/\/\*\w+\*\//', '', $response->getBody()->getContents())), '()'), 1);
        if ($data['meta']['result'] != 0) {
            throw new RemoteGatewayException('remote gateway error');
        }
        return $data['data']['area'];
    }

}