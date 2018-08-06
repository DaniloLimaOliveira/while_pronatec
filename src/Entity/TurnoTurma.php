<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class TurnoTurma
{
    public static function getTurnos()
    {
        return array(
            'Manhã' => 'M',
            'Tarde' => 'T',
            'Noite' => 'N'
        );
    }
}