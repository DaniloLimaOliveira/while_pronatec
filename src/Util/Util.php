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
        $data = \DateTime::createFromFormat('Y-m-d', $stringDate);
        $data->setTime(0,0,0);

        return $data;
    }

    public static function validaCPF($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }


}