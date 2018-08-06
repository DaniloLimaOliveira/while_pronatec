<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 29/05/2018
 * Time: 21:57
 */

namespace App\Entity;


class Estado
{
    public static function getEstadosBrasileiros()
    {
        return array(
            'AC' => 'AC',
            'AL' => 'AL',
            'AP' => 'AP',
            'AM' => 'AM',
            'BA' => 'BA',
            'CE' => 'CE',
            'DF' => 'DF',
            'ES' => 'ES',
            'GO' => 'GO',
            'MA' => 'MA',
            'MT' => 'MT',
            'MS' => 'MS',
            'MG' => 'MG',
            'PA' => 'PA',
            'PB' => 'PB',
            'PR' => 'PR',
            'PE' => 'PE',
            'PI' => 'PI',
            'RJ' => 'RJ',
            'RN' => 'RN',
            'RS' => 'RS',
            'RO' => 'RO',
            'RR' => 'RR',
            'SC' => 'SC',
            'SP' => 'SP',
            'SE' => 'SE',
            'TO' => 'TO'
        );
    }
}