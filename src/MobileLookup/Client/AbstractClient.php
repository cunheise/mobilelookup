<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:52
 */

namespace MobileLookup\Client;


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
        $this->cache = $cache;
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
     * @return string
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getLocation($number)
    {
        $key = md5($number);
        if ($this->cache->has($key)) {
            $location = $this->cache->get($key);
        } else {
            $location = $this->doGetLocation($number);
            $this->cache->set($key, $location);
        }
        return $location;
    }

    /**
     * @param string $number
     * @return string
     */
    abstract protected function doGetLocation($number);
}