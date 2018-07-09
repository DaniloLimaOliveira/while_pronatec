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
    const ATIVA = 'O';

    public static function getStatus()
    {
        return array(
            'Ativa' => 'O',
            'Pendente' => 'P',
            'Cancelada' => 'C',
            'Encerrada' => 'E'
        );
    }
}