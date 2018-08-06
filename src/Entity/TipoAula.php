<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class TipoAula
{
    public static function getTiposAula()
    {
        return array(
            'Teórica' => 'T',
            'Prática' => 'P'
        );
    }
}