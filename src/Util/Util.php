<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 19/06/2018
 * Time: 18:14
 */

namespace App\Util;


class Util
{

    public static function stringToDate($stringDate)
    {
        return \DateTime::createFromFormat('Y-m-d', $stringDate);
    }

}