<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Aluno extends Pessoa
{
    public function __construct()
    {
        $this->banco = new Banco();
        $this->endereco = new Endereco();
    }
}