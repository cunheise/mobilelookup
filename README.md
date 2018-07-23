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
    require dirname(__DIR__) . '/vendor/autoload.php';
    
    $number = '13605178123';
    $mobileLookupService = new MobileLookupService(new TaobaoClient(new FilesystemCache('namespace', 1 * 60 * 60, dirname(__DIR__) . '/runtime')));
    echo $mobileLookupService->getLocation($number) . PHP_EOL;
    
License
-------

Copyright 2008-2018.

Licensed under the [GNU Lesser General Public License, Version 3.0](https://www.gnu.org/licenses/lgpl.txt)