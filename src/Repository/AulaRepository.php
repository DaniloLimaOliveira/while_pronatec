<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class AulaRepository extends EntityRepository
{
    public function exist($cargaHoraria)
    {
        return $this->findOneBy(['cargaHoraria' => $cargaHoraria]) != null ? true : false;
    }

}