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
     * @ORM\ManyToOne(targetEntity="Polo")
     * @ORM\JoinColumn()
     */
    protected $polo;

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