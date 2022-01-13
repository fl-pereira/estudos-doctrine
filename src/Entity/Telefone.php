<?php

namespace Estudos\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity
 */
class Telefone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;
    /**
     * @Column (type="string", length=25)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    /**
     * @return mixed
     */
    public function getAluno()
    {
        return $this->aluno;
    }

    /**
     * @param mixed $aluno
     * @return Telefone
     */
    public function setAluno($aluno)
    {
        $this->aluno = $aluno;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     * @return Telefone
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
        return $this;
    }
}