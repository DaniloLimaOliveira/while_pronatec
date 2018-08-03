<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class StatusMatricula
{
    const CURSANDO = 'S';

    public static function getStatus()
    {
        return array(
            'Cursando' => 'S',
            'Pendente' => 'P',
            'Cancelada' => 'C',
            'Concluída' => 'F',
            'Desistente' => 'D',
            'Reprovado' => 'R',
        );
    }
}