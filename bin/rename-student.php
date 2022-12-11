<?php

use App\Doctrine\Entity\Student;
use App\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
//Como estou buscando apenas uma entidade não é necessário 
// ter um repository
//
//$studentRepository = $entityManager
//    ->getRepository(Student::class);

//Porém é necessário informar qual entidade eu estou procurando

$student = $entityManager
    ->find(Student::class,$argv[1]);

$student->name = $argv[2];

/*
/como a entidade já foi buscada pelo Doctrine ela está sendo observada pelo doctrine
/então não precisa usar o persist()
*/
$entityManager->flush();
