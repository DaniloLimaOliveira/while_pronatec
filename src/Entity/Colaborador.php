<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Colaborador extends Pessoa
{
    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank()
     */
    protected $funcao;

    /**
     * @ORM\ManyToOne(targetEntity="Regiao")
     * @ORM\JoinColumn()
     */
    protected $regiao;

    /**
     * @return mixed
     */
    public function getFuncao()
    {
        return $this->funcao;
    }

    /**
     * @param mixed $funcao
     */
    public function setFuncao($funcao): void
    {
        $this->funcao = $funcao;
    }

    /**
     * @return mixed
     */
    public function getRegiao()
    {
        return $this->regiao;
    }

    /**
     * @param mixed $regiao
     */
    public function setRegiao($regiao): void
    {
        $this->regiao = $regiao;
    }

    public function __construct()
    {
        $this->banco = new Banco();
        $this->endereco = new Endereco();
    }

    public function __toString()
    {
       return (string)$this->nome;
    }

}