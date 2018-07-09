<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class MatriculaRepository extends EntityRepository
{
    public function exist($aluno)
    {
        return $this->findOneBy(['aluno' => $aluno]) != null ? true : false;
    }

}