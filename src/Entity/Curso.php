<?php

namespace Estudos\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity
 */
class Curso
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $nome;

    /**
     * @ORM\ManyToMany(targetEntity="Aluno")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
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
     * @return Curso
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function addAluno(Aluno $aluno)
    {
        if ($this->alunos->contains($aluno)) {
            return $this;
        }

        $this->alunos->add($aluno);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAlunos(): ArrayCollection
    {
        return $this->alunos;
    }

}