<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TurmaRepository")
 */
class Turma
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $turno;

    /**
     * @ORM\Column(type="string", length=1)
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Curso")
     * @ORM\JoinColumn()
     */
    protected $curso;

    /**
     * @ORM\ManyToOne(targetEntity="Polo")
     * @ORM\JoinColumn()
     */
    protected $polo;

    /**
     * @ORM\OneToMany(targetEntity="CargaHoraria", mappedBy="turma")
     */
    protected $cargaHorarias;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getTurno()
    {
        return $this->turno;
    }

    public function getTurnoDescricao()
    {
        return array_search($this->turno, TurnoTurma::getTurnos());
    }

    /**
     * @param mixed $turno
     */
    public function setTurno($turno): void
    {
        $this->turno = $turno;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getStatusDescricao()
    {
        return array_search($this->status, StatusTurma::getStatus());
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @param mixed $curso
     */
    public function setCurso($curso): void
    {
        $this->curso = $curso;
    }

    /**
     * @return mixed
     */
    public function getPolo()
    {
        return $this->polo;
    }

    /**
     * @param mixed $polo
     */
    public function setPolo($polo): void
    {
        $this->polo = $polo;
    }

    /**
     * @return mixed
     */
    public function getCargaHorarias()
    {
        return $this->cargaHorarias;
    }

    /**
     * @param mixed $cargaHorarias
     */
    public function setCargaHorarias($cargaHorarias): void
    {
        $this->cargaHorarias = $cargaHorarias;
    }

    /**
     * Soma as horas das carga horarias registradas para turma
     */
    public function somarCargaHoraria()
    {
        $horas = 0;

        foreach ($this->cargaHorarias as $cargaHoraria)
        {
            $horas = $horas + $cargaHoraria->getCargaHoraria();
        }

        return $horas;
    }

    /**
     * Soma as horas das aulas registradas
     */
    public function somarHorasAulas()
    {
        $horas = 0;

        foreach ($this->cargaHorarias as $cargaHoraria)
        {
            $horas = $horas + $cargaHoraria->somarHorasAulas();
        }

        return $horas;
    }

    public function __construct()
    {
    }

    public function __toString()
    {
        return (string)$this->nome;
    }

}