<?php
/**
 * Created by PhpStorm.
 * User: Danilo
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class TurmaRepository extends EntityRepository
{
    public function exist($parametros = [])
    {
        return $this->findOneBy($parametros) != null ? true : false;
    }

}