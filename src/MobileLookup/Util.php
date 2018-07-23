<?php
/**
 * Created by PhpStorm.
 * User: nathan
 * Date: 2018/7/23
 * Time: 16:33
 */

namespace MobileLookup;

/**
 * Class Util
 * @package MobileLookup
 */
class Util
{
    /**
     * @param string $s
     */
    public static function convertToUtf8($s, $fromEncoding = 'GB18030')
    {
        return iconv($fromEncoding, "UTF-8", $s);
    }
}