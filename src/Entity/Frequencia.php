<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FrequenciaRepository")
 */
class Frequencia
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Aula")
     * @ORM\JoinColumn()
     */
    protected $aula;

    /**
     * @ORM\ManyToOne(targetEntity="Matricula")
     * @ORM\JoinColumn()
     */
    protected $matricula;

    /**
     * @ORM\Column(type="string", length=2)
     * @Assert\NotBlank()
     */
    protected $tipoFrequencia;

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
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * @param mixed $aula
     */
    public function setAula($aula): void
    {
        $this->aula = $aula;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula): void
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getTipoFrequencia()
    {
        return $this->tipoFrequencia;
    }

    /**
     * @param mixed $tipoFrequencia
     */
    public function setTipoFrequencia($tipoFrequencia): void
    {
        $this->tipoFrequencia = $tipoFrequencia;
    }

    public function __construct()
    {
    }

    public function __toString()
    {
        return 'Frequencia';
    }

}