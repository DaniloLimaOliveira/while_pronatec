<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class TipoFrequencia
{
    const PRESENTE = 'P';
    const FALTA = 'F';
    const FALTA_JUSTIFICADA = 'FJ';

    public static function getTipoFrequencia()
    {
        return array(
            'Presente' => 'P',
            'Falta' => 'F',
            'Falta Justificada' => 'FJ'
        );
    }
}