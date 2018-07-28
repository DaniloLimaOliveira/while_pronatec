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


    /**
     * Consulta as aulas do professor das carga horarias que estão em andamento.
     * @param $colaborador
     * @return mixed
     */
    public function selectAulas($colaborador)
    {
        $qb = $this->createQueryBuilder('aula')
            ->innerJoin('aula.cargaHoraria', 'cargaHoraria')
            ->where('cargaHoraria.status = :status')
            ->andWhere('cargaHoraria.colaborador = :colaborador')
            ->orderBy('aula.data', 'DESC')
            ->setParameter('status', 'P')
            ->setParameter('colaborador', $colaborador);

        return $qb->getQuery()->getResult();
    }

}