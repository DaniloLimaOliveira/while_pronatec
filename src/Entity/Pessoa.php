<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\MappedSuperclass
 */
class Pessoa
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max=255)
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=11)
     * @Assert\NotBlank()
     * @Assert\Length(min="1", max=11)
     */
    protected $cpf;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(min="0", max=15)
     */
    protected $rg;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Assert\Length(min="0", max=15)
     */
    protected $orgaoExpedidor;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $dataNascimento;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    protected $sexo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nomeMae;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nomePai;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $naturalidade;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $raca;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $telefone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $telefoneRecado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @ORM\Embedded(class="Endereco")
     */
    protected $endereco;

    /**
     * @ORM\Embedded(class="Banco")
     */
    protected $banco;

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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg): void
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getOrgaoExpedidor()
    {
        return $this->orgaoExpedidor;
    }

    /**
     * @param mixed $orgaoExpedidor
     */
    public function setOrgaoExpedidor($orgaoExpedidor): void
    {
        $this->orgaoExpedidor = $orgaoExpedidor;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param mixed $dataNascimento
     */
    public function setDataNascimento($dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getNomeMae()
    {
        return $this->nomeMae;
    }

    /**
     * @param mixed $nomeMae
     */
    public function setNomeMae($nomeMae): void
    {
        $this->nomeMae = $nomeMae;
    }

    /**
     * @return mixed
     */
    public function getNomePai()
    {
        return $this->nomePai;
    }

    /**
     * @param mixed $nomePai
     */
    public function setNomePai($nomePai): void
    {
        $this->nomePai = $nomePai;
    }

    /**
     * @return mixed
     */
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * @param mixed $naturalidade
     */
    public function setNaturalidade($naturalidade): void
    {
        $this->naturalidade = $naturalidade;
    }

    /**
     * @return mixed
     */
    public function getRaca()
    {
        return $this->raca;
    }

    /**
     * @param mixed $raca
     */
    public function setRaca($raca): void
    {
        $this->raca = $raca;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getTelefoneRecado()
    {
        return $this->telefoneRecado;
    }

    /**
     * @param mixed $telefoneRecado
     */
    public function setTelefoneRecado($telefoneRecado): void
    {
        $this->telefoneRecado = $telefoneRecado;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * @param mixed $banco
     */
    public function setBanco($banco): void
    {
        $this->banco = $banco;
    }

    public function __construct()
    {
    }
}