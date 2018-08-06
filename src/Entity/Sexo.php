<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class Sexo
{
    public static function getGeneros()
    {
        return array(
            'Masculino' => 'M',
            'Femino' => 'F'
        );
    }
}