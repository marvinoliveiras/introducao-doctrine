<?php

use App\Doctrine\Entity\{
    Phone,Student
};
use App\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__.'/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$student = new Student($argv[1]);
for($i = 2; $i < $argc; $i++){
    $student->addPhone(new Phone($argv[$i]));
}

$entityManager->persist($student);
$entityManager->flush();