<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CargaHorariaRepository")
 */
class CargaHoraria
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Colaborador")
     * @ORM\JoinColumn()
     */
    protected $colaborador;

    /**
     * @ORM\ManyToOne(targetEntity="Disciplina")
     * @ORM\JoinColumn()
     */
    protected $disciplina;

    /**
     * @ORM\ManyToOne(targetEntity="Turma")
     * @ORM\JoinColumn()
     */
    protected $turma;

    /**
     * @ORM\Column(type="integer")
     */
    protected $cargaHoraria;

    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank()
     */
    protected $status;

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
    public function getColaborador()
    {
        return $this->colaborador;
    }

    /**
     * @param mixed $colaborador
     */
    public function setColaborador($colaborador): void
    {
        $this->colaborador = $colaborador;
    }

    /**
     * @return mixed
     */
    public function getDisciplina()
    {
        return $this->disciplina;
    }

    /**
     * @param mixed $disciplina
     */
    public function setDisciplina($disciplina): void
    {
        $this->disciplina = $disciplina;
    }

    /**
     * @return mixed
     */
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * @param mixed $turma
     */
    public function setTurma($turma): void
    {
        $this->turma = $turma;
    }

    /**
     * @return mixed
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * @param mixed $cargaHoraria
     */
    public function setCargaHoraria($cargaHoraria): void
    {
        $this->cargaHoraria = $cargaHoraria;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getStatusDescricao()
    {
        return array_search($this->status, StatusTurma::getStatus());
    }

    public function __construct()
    {
    }

    public function __toString()
    {
        return 'Carga Horária';
    }

}