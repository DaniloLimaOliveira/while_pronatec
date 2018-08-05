<?php
/**
 * Created by PhpStorm.
 * User: Vanessa
 * Date: 05/07/2018
 * Time: 23:30
 */

namespace App\Repository;

use App\Entity\TipoFrequencia;
use Doctrine\ORM\EntityRepository;

class FrequenciaRepository extends EntityRepository
{
    public function exist($matricula)
    {
        return $this->findOneBy(['matricula' => $matricula]) != null ? true : false;
    }

    public function existFrequencia($frequencia)
    {
        return $this->findOneBy(['aula' => $frequencia->getAula(), 'matricula' => $frequencia->getMatricula()]) != null ? true : false;
    }

    public function consultarFrequencias($dataInicio, $dataFim)
    {
        $hora = ' 00:00:00';

        $dataInicio = $dataInicio . $hora;
        $dataFim = $dataFim . $hora;

        $where = " where a.data >= '$dataInicio' and a.data <= '$dataFim'";


        $em = $this->getEntityManager();

        $subQuery = " select count(*) 
                      from frequencia f_sub 
                      inner join aula a_sub on a_sub.id=f_sub.aula_id 
                      where f_sub.tipo_frequencia='%s' and f_sub.matricula_id=m.id and 
                      (a_sub.data >= '$dataInicio' and a_sub.data <= '$dataFim')";

        $query = "select distinct p.nome as 'polo', c.nome as 'curso', t.nome as 'turma', al.cpf as 'cpf', 
                        al.nome as 'aluno', al.banco_nome as 'banco', al.banco_agencia as 'agencia', al.banco_conta as 'conta',
                        (".sprintf($subQuery, TipoFrequencia::PRESENTE).") as 'presencas',
                        (".sprintf($subQuery, TipoFrequencia::FALTA).") as 'faltas',
                        (".sprintf($subQuery, TipoFrequencia::FALTA_JUSTIFICADA).") as 'faltasJustificadas',
                        ((".sprintf($subQuery, TipoFrequencia::PRESENTE).")  * 10) as 'totalReceber'
                from frequencia f
                inner join matricula m on f.matricula_id=m.id
                inner join aluno al on al.id=m.aluno_id
                inner join aula a on a.id=f.aula_id
                inner join carga_horaria ch on ch.id=a.carga_horaria_id
                inner join turma t on t.id=ch.turma_id
                inner join curso c on c.id=t.curso_id
                inner join polo p on p.id = t.polo_id
                where a.data >= '$dataInicio' and a.data <= '$dataFim'";


/*
        $RAW_QUERY = "  select distinct p.nome as 'polo', c.nome as 'curso', t.nome as 'turma', al.cpf as 'cpf', 
                                al.nome as 'aluno', al.banco_nome as 'banco', al.banco_agencia as 'agencia', al.banco_conta as 'conta',
                                (select count(*) from frequencia f_sub where f_sub.tipo_frequencia='P' and f_sub.matricula_id=m.id) as 'presencas',
                                (select count(*) from frequencia f_sub where f_sub.tipo_frequencia='F' and f_sub.matricula_id=m.id) as 'faltas',
                                (select count(*) from frequencia f_sub where f_sub.tipo_frequencia='FJ' and f_sub.matricula_id=m.id) as 'faltasJustificadas',
                                ((select count(*) from frequencia f_sub where f_sub.tipo_frequencia='P' and f_sub.matricula_id=m.id) * 10) as 'totalReceber'
                        from frequencia f
                        inner join matricula m on f.matricula_id=m.id
                        inner join aluno al on al.id=m.aluno_id
                        inner join aula a on a.id=f.aula_id
                        inner join carga_horaria ch on ch.id=a.carga_horaria_id
                        inner join turma t on t.id=ch.turma_id
                        inner join curso c on c.id=ch.turma_id=t.id
                        inner join polo p on p.id = t.polo_id
                        $where
        ";*/

        $statement = $em->getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->fetchAll();

        return $result;

    }

}