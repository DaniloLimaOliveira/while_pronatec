<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class FrequenciaRepository extends EntityRepository
{
    public function exist($matricula)
    {
        return $this->findOneBy(['matricula' => $matricula]) != null ? true : false;
    }

}