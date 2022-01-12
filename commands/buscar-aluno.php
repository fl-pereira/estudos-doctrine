<?php

use Estudos\Doctrine\Helper\EntityManagerFactory;
use Estudos\Doctrine\Entity\Aluno;

 require_once __DIR__ . '/../vendor/autoload.php';

 $entityManagerFactory = new EntityManagerFactory();
 $entityManager = $entityManagerFactory->getEntityManager();

 $alunoRepository = $entityManager->getRepository(Aluno::class);

 /** @var  Aluno[] $alunoList */
 $alunoList = $alunoRepository->findAll();

 foreach ($alunoList as $aluno) {
     echo "ID: {$aluno->getId()}\nNome: {$aluno->getNome()}\n\n\ ";
 }

 $felipePereira = $alunoRepository->findOneBy([
     'nome' => 'Felipe Pereira'
 ]);

 var_dump($felipePereira);
