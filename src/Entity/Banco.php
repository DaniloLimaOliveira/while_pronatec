<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class Banco
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Blank()
     */
    protected $agencia;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Blank()
     */
    protected $conta;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     * @Assert\Blank()
     */
    //protected $operacao;

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
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * @param mixed $agencia
     */
    public function setAgencia($agencia): void
    {
        $this->agencia = $agencia;
    }

    /**
     * @return mixed
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * @param mixed $conta
     */
    public function setConta($conta): void
    {
        $this->conta = $conta;
    }

    public function __construct()
    {
    }

}