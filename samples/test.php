<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 15:40
 */

use MobileLookup\Client\BaifubaoClient;
use MobileLookup\MobileLookupService;
use Symfony\Component\Cache\Simple\FilesystemCache;

require dirname(__DIR__) . '/vendor/autoload.php';

$cache = new FilesystemCache('namespace', 1 * 60 * 60 * 24, dirname(__DIR__) . '/runtime/cache');
$client = new BaifubaoClient($cache);
$mobileLookupService = new MobileLookupService($client);
echo $client->getLocation(13605177123) . PHP_EOL;