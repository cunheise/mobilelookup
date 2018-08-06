<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:52
 */

namespace MobileLookup\Client;


use MobileLookup\Response;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\Cache\Simple\NullCache;

/**
 * Class AbstractClient
 * @package MobileLookup\Client
 */
abstract class AbstractClient implements ClientInterface
{
    /**
     * @var array $headers
     */
    protected $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36',
    ];
    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * AbstractClient constructor.
     * @param CacheInterface|null $cache
     */
    public function __construct(CacheInterface $cache = null)
    {
        if ($cache == null) {
            $cache = new NullCache();
        }
        $this->setCache($cache);
    }

    /**
     * @param CacheInterface $cache
     * @return ClientInterface
     */
    public function setCache($cache)
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @param string $number
     * @return mixed|Response
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function request($number)
    {
        $key = md5($number);
        if ($this->cache->has($key)) {
            $response = $this->cache->get($key);
        } else {
            $response = $this->doRequest($number);
            $this->cache->set($key, $response);
        }
        return new Response($this->parse($response));
    }

    /**
     * @param string $number
     * @return string
     */
    abstract protected function doRequest($number);

    /**
     * @param string $response
     * @return array
     */
    abstract protected function parse($response);

}