<?php

use App\Doctrine\Entity\Phone;
use App\Doctrine\Entity\Student;
use App\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$student = new Student("Aluno com Phones");
$student->addPhone(new Phone("(11)99999-9999"));
$student->addPhone(new Phone("(11)9999-9999"));
$entityManager->persist($student);
$entityManager->flush();