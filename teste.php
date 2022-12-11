<?php
require_once __DIR__.'/vendor/autoload.php';
use App\Doctrine\Helper\EntityManagerCreator;

$entityManager = EntityManagerCreator::createEntityManager();
print_r($entityManager);
