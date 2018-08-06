<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/8/6
 * Time: 11:41
 */

namespace MobileLookup\Client;


use GuzzleHttp\Client;

/**
 * Class Company360Client
 * @package MobileLookup\Client
 */
class Company360Client extends AbstractClient
{
    /**
     * @param string $number
     * @return string
     * @throws RemoteGatewayException
     */
    protected function doRequest($number)
    {
        $client = new Client();
        $response = $client->get('https://cx.shouji.360.cn/phonearea.php', [
            'query' => [
                'number' => $number
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
     */
    protected function parse($response)
    {
        $data = json_decode($response, true);
        return ['location' => $data['data']['province'], 'carrier' => $data['data']['sp']];
    }

}