MobileLookup
============

Install
-------
    composer require mobilelookup/mobilelookup

Library
---
Library for get location and carrier information via china mobile number

Sample
------
    use MobileLookup\Client\BaifubaoClient;
    use MobileLookup\MobileLookupService;
    use Symfony\Component\Cache\Simple\FilesystemCache;
    
    require dirname(__DIR__) . '/vendor/autoload.php';
    
    $cache = new FilesystemCache('namespace', 1 * 60 * 60 * 24, dirname(__DIR__) . '/runtime/cache');
    $mobileLookupService = new MobileLookupService(new BaifubaoClient($cache));
    echo $mobileLookupService->getLocation('13605177123') . PHP_EOL;
    echo $mobileLookupService->getCarrier('13605177123') . PHP_EOL;
    
License
-------

Copyright 2008-2018.

Licensed under the [GNU Lesser General Public License, Version 3.0](https://www.gnu.org/licenses/lgpl.txt)