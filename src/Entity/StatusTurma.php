<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class StatusTurma
{
    const EM_ANDAMENTO = 'P';

    public static function getStatus()
    {
        return array(
            'Aberta' => 'O',
            'Em Andamento' => 'P',
            'Encerrada' => 'F',
            'Cancelada' => 'C'
        );
    }
}