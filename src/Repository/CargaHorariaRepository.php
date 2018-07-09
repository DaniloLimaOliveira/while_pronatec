<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class CargaHorariaRepository extends EntityRepository
{
    public function exist($parametros = [])
    {
        return $this->findOneBy($parametros) != null ? true : false;
    }
}