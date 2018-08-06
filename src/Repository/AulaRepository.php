<?php
/**
 * Created by PhpStorm.
 * User: Danilo
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

    /**
     * Relatório financeiro para pagamento dos professores
     * @param $dataInicio
     * @param $dataFim
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function consultarAulas($dataInicio, $dataFim)
    {
        $hora = ' 00:00:00';

        $dataInicio = $dataInicio . $hora;
        $dataFim = $dataFim . $hora;

        $em = $this->getEntityManager();

        $query = "select co.cpf as 'cpf', co.nome as 'professor', 
                         co.banco_nome as 'banco', co.banco_agencia as 'agencia', co.banco_conta as 'conta', 
                         count(a.id) as 'aulas', sum(a.quantidade_horas) as 'horas', 
                         (sum(a.quantidade_horas) * 50) as 'totalReceber'
                from aula a
                inner join colaborador co on ch.id=a.carga_horaria_id
                inner join carga_horaria ch on ch.id=a.carga_horaria_id and ch.colaborador_id = co.id
                where co.funcao = 'P' and
                      a.data >= '$dataInicio' and a.data <= '$dataFim'
                group by co.cpf, co.nome, co.banco_nome, co.banco_agencia, co.banco_conta
                order by co.nome";

        $statement = $em->getConnection()->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        return $result;
    }

}