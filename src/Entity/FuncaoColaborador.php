<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class FuncaoColaborador
{
    const PROFESSOR = 'P';

    public static function getFuncoes()
    {
        return array(
            'Professor' => 'P',
            'Apoio Administrativo' => 'A',
            'Supervisor' => 'S',
            'Coordenador' => 'A'
        );
    }
}