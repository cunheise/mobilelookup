MobileLookup
============

Install
-------
    composer require nathan/mobilelookup

Lib
---
Get location information via china mobile phone number

Sample
------
    use MobileLookup\Client\BaifubaoClient;
    use MobileLookup\MobileLookupService;
    use Symfony\Component\Cache\Simple\FilesystemCache;
    
    require dirname(__DIR__) . '/vendor/autoload.php';
    
    $cache = new FilesystemCache('namespace', 1 * 60 * 60 * 24, dirname(__DIR__) . '/runtime/cache');
    $client = new BaifubaoClient($cache);
    $mobileLookupService = new MobileLookupService($client);
    echo $client->getLocation(13605177123) . PHP_EOL;
    
License
-------

Copyright 2008-2018.

Licensed under the [GNU Lesser General Public License, Version 3.0](https://www.gnu.org/licenses/lgpl.txt)