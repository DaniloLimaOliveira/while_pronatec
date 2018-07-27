<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Doctrine\ORM\Mapping\Table;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AulaRepository")
 * @Table(uniqueConstraints={@UniqueConstraint(name="aula_idx", columns={"carga_horaria_id", "data"})})
 */
class Aula
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min="5")
     */
    protected $conteudoMinistrado;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    protected $data;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     * @Assert\NotBlank()
     * @Assert\Range(   min = 1,
     *                  max = 8,
     *                  minMessage = "No mínimo 1 hora de aula",
     *                  maxMessage = "No máximo 8 horas de aula")
     */
    protected $quantidadeHoras;

    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank()
     */
    protected $tipoAula;

    /**
     * @ORM\ManyToOne(targetEntity="CargaHoraria")
     * @ORM\JoinColumn()
     */
    protected $cargaHoraria;

    /**
     * @ORM\OneToMany(targetEntity="Frequencia", mappedBy="aula", cascade={"persist", "remove"})
     */
    protected $frequencias;

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
    public function getConteudoMinistrado()
    {
        return $this->conteudoMinistrado;
    }

    /**
     * @param mixed $conteudoMinistrado
     */
    public function setConteudoMinistrado($conteudoMinistrado): void
    {
        $this->conteudoMinistrado = $conteudoMinistrado;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeHoras()
    {
        return $this->quantidadeHoras;
    }

    /**
     * @param mixed $quantidadeHoras
     */
    public function setQuantidadeHoras($quantidadeHoras): void
    {
        $this->quantidadeHoras = $quantidadeHoras;
    }

    /**
     * @return mixed
     */
    public function getTipoAula()
    {
        return $this->tipoAula;
    }

    /**
     * @param mixed $tipoAula
     */
    public function setTipoAula($tipoAula): void
    {
        $this->tipoAula = $tipoAula;
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
    public function getFrequencias()
    {
        return $this->frequencias;
    }

    /**
     * @param mixed $frequencia
     */
    public function setFrequencias($frequencias): void
    {
        $this->frequencias = $frequencias;
    }

    public function getDataFormatada(){
        return $this->data->format('d/m/Y');
    }

    public function __construct()
    {
    }

    public function __toString()
    {
        return 'Aula';
    }

    public function asString()
    {
        return $this->getCargaHoraria()->getTurma()->getCurso()->getNome() . ' - ' .
                $this->getCargaHoraria()->getTurma()->getNome() . ' - ' .
                $this->getCargaHoraria()->getDisciplina() . ' - ' .
                $this->getCargaHoraria()->getColaborador()->getNome() . ' - ' .
                $this->getDataFormatada();
    }

}