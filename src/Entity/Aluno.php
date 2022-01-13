<?php

namespace Estudos\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**
 * @Entity(repositoryClass="Estudos\Doctrine\Repository\AlunoRepository")
 */
class Aluno
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $nome;

    /**
     * @ORM\OneToMany(targetEntity="Telefone", mappedBy="Aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $telefones;

    /**
     * @ORM\ManyToMany(targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Aluno
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTelefones(): ArrayCollection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso)
    {
        if ($this->cursos->contains($curso)) {
            return $this;
        }
        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    public function getCursos(): ArrayCollection
    {
        return $this->cursos;
    }
}
